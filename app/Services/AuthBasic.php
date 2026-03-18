<?php

namespace App\Services;

use App\Contracts\AuthContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthBasic implements AuthContract
{
    public function check(string $login, string $password, string $action, string $entity): bool
    {
        $user = User::where('login', $login)->first();

        if ($user && Hash::check($password, $user->password)) {
            dd($user, $action, $entity);
            return true;
        }

        return false;
    }
}
