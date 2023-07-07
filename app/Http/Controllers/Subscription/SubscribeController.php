<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\SubscribeRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __invoke(SubscribeRequest $request)
    {
        $input = $request->validated();

        $plan = Plan::query()->findOrFail($input['plan_id']);

        $stripePriceId = $plan->stripe_price_monthly_id;
        if ($input['frequency'] === 'yearly') {
            $stripePriceId = $plan->stripe_price_yearly_id;
        }

        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        try {
            $subscription = $user
                ->newSubscription($plan->name, $stripePriceId)
                ->checkout([
                    'success_url' => config('app.site_url') . '/assinatura/sucesso',
                    'cancel_url' => config('app.site_url') . '/assinatura/cancelado',
                ]);
        } catch (\Exception $e) {
            dd($e);
        }

        return [
            'stripe_url' => $subscription->url
        ];
    }
}
