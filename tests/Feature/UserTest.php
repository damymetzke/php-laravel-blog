<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function guestDoesNotHaveAccessToAdminPages()
    {
        $post = $this->setupDefaultPost();

        $responses = [
            $this->get('/admin'),
            $this->get('/admin/create'),
            $this->get('/admin/post/' . $post->id . '/edit')
        ];

        foreach ($responses as $response) {
            $response->assertRedirect('/admin/login');
        }
    }

    /**
     * @test
     */
    public function userDoesHaveAccessToAdminPages()
    {
        $post = $this->setupDefaultPost();

        $this->actingAs(User::createUser('admin', 'admin@admin.admin', 'password123'));

        $responses = [
            $this->get('/admin'),
            $this->get('/admin/create'),
            $this->get('/admin/post/' . $post->id . '/edit')
        ];

        foreach ($responses as $response) {
            $response->assertOk();
        }
    }

    private function setupDefaultPost()
    {
        return Post::createPost([
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body'
        ]);
    }
}
