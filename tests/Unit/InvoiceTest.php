<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_get_invoice()
    {
        $user = User::factory()->create();
        $subscription = Subscription::factory()->create([
            'user_id' => $user->id,
            'plan' => 'standard',
            'starts_at' => now(),
            'expires_at' => now()->addMonth(),
        ]);

        $response = $this->actingAs($user)->getJson("/api/subscriptions/{$subscription->id}/invoice");

        $response->assertStatus(200)
            ->assertJson([
                'user' => $user->name,
                'plan' => 'standard',
                'starts_at' => $subscription->starts_at->format('Y-m-d H:i:s'),
                'expires_at' => $subscription->expires_at->format('Y-m-d H:i:s'),
            ]);
    }
}
