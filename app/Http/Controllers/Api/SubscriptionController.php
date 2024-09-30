<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function purchase(Request $request): JsonResponse
    {
        $user = $request->user();

        $plan = $request->input('plan');

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'plan' => $plan,
            'starts_at' => now(),
            'expires_at' => now()->addMonth(),
        ]);

        return response()->json($subscription);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function invoice($id): \Illuminate\Http\JsonResponse
    {
        $subscription = Subscription::query()->findOrFail($id);
        return response()->json([
            'user' => $subscription->user->name,
            'plan' => $subscription->plan,
            'starts_at' => $subscription->starts_at,
            'expires_at' => $subscription->expires_at,
        ]);
    }


}
