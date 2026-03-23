<?php

namespace App\Contracts;

use App\Models\User;

interface AuthContract
{
    public function login(string $login, string $password): int;
    public function check(string $login, string $action, string $project): bool;
}
