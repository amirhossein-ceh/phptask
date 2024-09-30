<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Section;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SectionAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_with_premium_plan_can_access_all_sections()
    {
        $user = User::factory()->create();
        Subscription::factory()->create([
            'user_id' => $user->id,
            'plan' => 'premium',
            'starts_at' => now(),
            'expires_at' => now()->addMonth(),
        ]);

        Section::factory()->count(3)->create();

        $response = $this->actingAs($user)->getJson('/api/sections/access');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_user_with_basic_plan_can_access_only_one_section()
    {
        $user = User::factory()->create();
        Subscription::factory()->create([
            'user_id' => $user->id,
            'plan' => 'basic',
            'starts_at' => now(),
            'expires_at' => now()->addMonth(),
        ]);

        Section::factory()->count(3)->create();

        $response = $this->actingAs($user)->getJson('/api/sections/access');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }
}
