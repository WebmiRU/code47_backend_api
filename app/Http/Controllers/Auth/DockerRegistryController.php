<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\AuthContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use Illuminate\Http\Request;

class DockerRegistryController extends Controller
{
    public function pull(Request $request, AuthContract $auth): AuthResource
    {
        $login = $request->getUser();
        $password = $request->getPassword();
        $right = 'pull';
        $entity = $request->input('entity');

        return new AuthResource([
            'login' => $login,
            'right' => $right,
            'entity' => $entity,
            'allow' => $auth->check($login, $password, $right, $entity),
        ]);
    }

    public function push(Request $request)
    {
        return 'push';
    }
}
