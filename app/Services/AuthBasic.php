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
        $userProjectAction = null;

        switch ($action) {
            case 'pull':
                $userProjectAction = UserProjectAction::query()
                    ->where('login', $login)
                    ->where(function ($query) use ($action) {
                        $query
                            ->where('action_key', '=', 'docker.registry.push')
                            ->orWhere('action_key', '=', 'docker.registry.pull');
                    })
                    ->where('project_key', $project)
                    ->first();
                break;

            case 'push':
                $userProjectAction = UserProjectAction::query()
                    ->where('login', $login)
                    ->where('action_key', 'docker.registry.push')
                    ->where('project_key', $project)
                    ->first();
                break;
        }

        return (bool)$userProjectAction;
    }

}
