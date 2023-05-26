<?php

namespace App\Listeners;

use App\Mail\ForgotPasswordTokenMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendForgotPasswordTokenListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        $token = $event->token;
        Mail::to($user->email)
            ->send(new ForgotPasswordTokenMail($user, $token));
    }
}
