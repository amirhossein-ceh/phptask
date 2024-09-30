<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\JsonResponse;

class SectionController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $sections = Section::all();
        return response()->json($sections);
    }

    /**
     * @return JsonResponse
     */
    public function access(): JsonResponse
    {
        $user = auth()->user();
        $subscription = $user->subscriptions()->latest()->first();

        if (!$subscription || $subscription->expires_at < now()) {
            return response()->json(['message' => 'No active subscription'], 403);
        }

        $sections = Section::query()->where('id', '<=', $this->getSectionAccessLimit($subscription->plan))->get();
        return response()->json($sections);
    }

    /**
     * @param $plan
     * @return int
     */
    private function getSectionAccessLimit($plan): int
    {
        return match ($plan) {
            'premium' => 3,
            'standard' => 2,
            'basic' => 1,
            default => 0,
        };
    }

}
