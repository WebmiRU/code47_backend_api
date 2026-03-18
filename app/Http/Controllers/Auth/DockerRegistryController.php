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
        $action = $request->input('action');
        $entity = $request->input('entity');

        return new AuthResource([
            'login' => $login,
            'action' => $action,
            'entity' => $entity,
            'allow' => $auth->check($login, $password, $action, $entity),
        ]);
    }

    public function push(Request $request)
    {
        return 'push';
    }
}
