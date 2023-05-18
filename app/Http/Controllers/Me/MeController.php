<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function show()
    {
        return new UserResource(auth()->user());
    }
}
