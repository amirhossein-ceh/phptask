<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'plan' => $this->faker->randomElement(['basic', 'standard', 'premium']),
            'starts_at' => Carbon::now(),
            'expires_at' => Carbon::now()->addMonth(),
        ];
    }
}
