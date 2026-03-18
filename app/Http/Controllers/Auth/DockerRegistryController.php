<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\AuthContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Models\Action;
use App\Models\Project;
use Illuminate\Http\Request;

class DockerRegistryController extends Controller
{
    public function index(Request $request, AuthContract $auth): AuthResource
    {
        $login = $request->getUser();
        $password = $request->getPassword();
        $action = $request->input('action');
        $entity = $request->input('entity');
        [$projectName, $appName] = explode('/', $entity);
        $allow = false;

        $action = Action::where('key', "docker.registry.{$action}")->first();
        $project = Project::where('key', $projectName)->first();

        if ($action) {
            $allow = $auth->check($login, $password, $action, $entity);
        }

        dd('ACTION', $action, $project, $appName);


        return new AuthResource([
            'login' => $login,
            'action' => $action,
            'entity' => $entity,
            'allow' => $allow,
        ]);
    }
}
