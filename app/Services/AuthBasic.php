<?php

namespace App\Services;

use App\Contracts\AuthContract;
use App\Models\User;
use App\Models\UserProjectAction;
use Illuminate\Support\Facades\Hash;

class AuthBasic implements AuthContract
{
    public function login(string $login, string $password): int
    {
        $user = User::where('login', $login)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user->id;
        }

        return 0;
    }

    public function check(string $login, string $action, string $project): bool
    {
        $userProjectAction = UserProjectAction::query()
            ->where('login', $login)
            ->where('action', $action)
            ->where('project_key', $project)
            ->first();

        return (bool)$userProjectAction;
    }

}
