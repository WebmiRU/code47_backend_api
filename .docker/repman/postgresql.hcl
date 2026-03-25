job "repman-postgres" {
    datacenters = ["dc1"]

    group "postgres" {
        network {
            mode = "bridge"
            port "db" { static = 5432 }
        }

        volume "repman_db" {
            type      = "host"
            source    = "repman_db"
            read_only = false
        }

        task "postgres" {
            driver = "docker"
            config { image = "postgres:17-alpine" }

            env {
                POSTGRES_DB       = "repman"
                POSTGRES_USER     = "repman"
                POSTGRES_PASSWORD = "repman"
            }

            volume_mount {
                volume      = "repman_db"
                destination = "/var/lib/postgresql/data"
            }

            service {
                name = "repman-postgres"
                port = "db"
                provider = "consul"
                # ВАЖНО: заставляет Consul отдавать IP контейнера, а не хоста
                address_mode = "driver"

                check {
                    type     = "tcp"
                    interval = "10s"
                    timeout  = "2s"
                }
            }
        }
    }
}
