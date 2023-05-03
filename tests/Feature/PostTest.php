<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function assert_post_route_works()
    {
        $response = $this->post('/api/1/posts/create',[
            "title" => "I am a test",
            "description" => "I am a description",
            "body" => "Post with vynch"
        ]);

        $response->assertStatus(201)
        ->assertJson([
            'message' => "Post Created",
        ]);
    }

    /**
     * @test
     * 
     */
    public function assert_dabase_sees_the_post()
    {
        $response = $this->post('/api/1/posts/create',[
            "title" => "I am a test",
            "description" => "I am a description",
            "body" => "Post with vynch"
        ]);

        // $this->assertDatabaseCount('posts', 1);
        $this->assertDatabaseHas('posts',[
            'title' => 'I am a test'
        ] );
    }
}
