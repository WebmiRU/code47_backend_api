<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\AuthContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use Illuminate\Http\Request;

class DockerRegistryController extends Controller
{
    public function index(Request $request, AuthContract $auth): AuthResource
    {
        $login = $request->getUser();
        $password = $request->getPassword();
        $action = $request->input('action');
        $entity = $request->input('entity');
        $allow = false;


        if (!$auth->login($login, $password)) {
            return new AuthResource([
                'login' => $login,
                'action' => $action,
                'entity' => $entity,
                'allow' => $allow,
            ]);
        }

        [$project] = explode('/', $entity);

        if ($action) {
            $allow = $auth->check($login, $action, $project);
        }

//        dd('ACTION', $project);


        return new AuthResource([
            'login' => $login,
            'action' => $action,
            'entity' => $entity,
            'allow' => $allow,
        ]);
    }
}
