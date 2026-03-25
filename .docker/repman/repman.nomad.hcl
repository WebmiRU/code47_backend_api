job "repman" {
    datacenters = ["dc1"]

    group "repman" {
        network {
            mode = "host"
            port "http" { static = 8181 }
        }

        # Общая папка внутри аллокации, доступная обоим таскам
        ephemeral_disk {
            size = 300
        }

        volume "repman_data" {
            type   = "host"
            source = "repman_data"
        }

        # 1. PHP-FPM
        task "repman-php" {
            driver = "docker"
            config {
                image = "buddy/repman:latest"
                network_mode = "host"
                # Копируем содержимое /app во временный диск, чтобы nginx его видел
                volumes = ["alloc/data:/shared_app"]
            }

            # Скрипт, который при старте копирует файлы приложения в общую папку
            lifecycle {
                hook    = "prestart"
                sidecar = false
            }

            template {
                data = <<EOH
DATABASE_URL="postgresql://repman:repman@127.0.0.1:5432/repman?sslmode=disable"
APP_ENV="prod"
APP_DEBUG=0
APP_SECRET="SuperSecret1234567890"
APP_HOST="repman.b220.ru"
EOH
                destination = "local/env"
                env         = true
            }

            volume_mount {
                volume      = "repman_data"
                destination = "/app/var"
            }
        }

        # 2. NGINX
        task "nginx" {
            driver = "docker"
            config {
                image = "nginx:alpine"
                network_mode = "host"
                volumes = [
                    "local/nginx.conf:/etc/nginx/conf.d/default.conf",
                    "alloc/data:/app" # Nginx берет файлы отсюда
                ]
            }

            template {
                data = <<EOH
server {
    listen 8181;
    root /app/public; # Файлы приложения теперь тут
    index index.php;

    location / {
        try_files $uri /index.php$is_args$args;
    }

    location ~ ^/index\.php(/|$) {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        # Путь к файлу внутри repman-php контейнера
        fastcgi_param SCRIPT_FILENAME /app/public/index.php;
    }
}
EOH
                destination = "local/nginx.conf"
            }

            service {
                name = "repman"
                port = "http"
                provider = "consul"
                tags = [
                    "traefik.enable=true",
                    "traefik.http.routers.repman.rule=Host(`repman.b220.ru`)",
                    "traefik.http.routers.repman.entrypoints=websecure",
                    "traefik.http.routers.repman.tls=true",
                    "traefik.http.routers.repman.tls.certresolver=letsencrypt"
                ]
                check {
                    type     = "tcp"
                    interval = "10s"
                    timeout  = "2s"
                }
            }
        }
    }
}
