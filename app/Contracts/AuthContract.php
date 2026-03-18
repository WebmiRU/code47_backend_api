<?php

namespace App\Contracts;

use App\Models\User;

interface AuthContract
{
    /**
     * Описываем метод, который должен быть у любого сервиса авторизации
     */
    public function check(string $login, string $password, string $right, string $entity): bool;
}
