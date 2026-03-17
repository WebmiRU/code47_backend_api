<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DockerRegistry extends Controller
{
    public function pull(Request $request)
    {
        return 'pull';
    }

    public function push(Request $request)
    {
        return 'push';
    }
}
