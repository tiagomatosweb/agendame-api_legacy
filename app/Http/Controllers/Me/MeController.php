<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $user->loadMissing('roles');
        return new UserResource($user);
    }
}
