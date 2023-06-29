<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        try {
            $subscription = $user->newSubscription('default', 'price_1NOTgvDWJ2xEgC6gZnFvQqbg')
                ->checkout([
                    'success_url' => config('app.site_url') . '/success',
                    'cancel_url' => config('app.site_url') . '/cancel',
                ]);
        } catch (\Exception $e) {
            dd($e);
        }

        return [
            'stripe_url' => $subscription->url
        ];
    }
}
