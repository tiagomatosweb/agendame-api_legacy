<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\PasswordResetTokenInvalidException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordResetRequest;
use App\Http\Resources\User\UserResource;
use App\Models\UserPasswordResetToken;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function __invoke(PasswordResetRequest $request)
    {
        $input = $request->validated();

        $token = UserPasswordResetToken::query()
            ->with('user')
            ->whereToken($input['token'])
            ->whereDate('created_at', '>=', now()->subHours(24)->toDateString())
            ->first();

        if (!$token) {
            throw new PasswordResetTokenInvalidException();
        }

        $user = $token->user;
        $user->password = bcrypt($input['password']);
        $user->save();

        $user->resetPasswordTokens()->delete();

        return new UserResource($user);
    }
}
