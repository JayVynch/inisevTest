<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function assert_user_can_subscribe()
    {
        $response = $this->post('/api/users/1/subscribes',[
            'email' => 'jenkins.dorthy@example.net'
        ]);

        $response->assertStatus(201);
    }
}
