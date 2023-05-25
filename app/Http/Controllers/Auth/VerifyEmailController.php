<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\EmailAlreadyVerifiedException;
use App\Exceptions\TokenInvalidException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function __invoke(VerifyEmailRequest $request)
    {
        $input = $request->validated();

        $user = User::query()
            ->whereToken($input['token'])
            ->first();

        if (!$user) {
            throw new TokenInvalidException();
        }

        if ($user->email_verified_at) {
            throw new EmailAlreadyVerifiedException();
        }

        $user->email_verified_at = now();
        $user->save();

        return new UserResource($user);
    }
}
