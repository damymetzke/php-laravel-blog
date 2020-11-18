<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;

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

    /**
     * @test
     */
    public function guestCanNotCreateNewPost()
    {
        $this->post('/admin/post', [
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body'
        ]);

        $this->assertCount(0, Post::all());
    }

    /**
     * @test
     */
    public function userCanCreateNewPost()
    {
        $this->actingAs(User::createUser('admin', 'admin@admin.admin', 'password123'));

        $this->post('/admin/post', [
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body'
        ]);

        $this->assertCount(1, Post::all());

        $post = Post::get()->first();

        $this->assertNotNull($post);
        $this->assertSame($post->slug, 'Slug');
        $this->assertSame($post->title, 'Title');
        $this->assertSame($post->body, 'Body');
    }

    /**
     * @test
     */
    public function guestCanNotUpdateExistingPost()
    {
        $id = $this->setupDefaultPost()->id;

        $this->patch('/admin/post/' . $id, [
            'slug' => 'Slug2',
            'title' => 'Title2',
            'body' => 'Body2'
        ]);

        $post = Post::get()->first();

        $this->assertCount(1, Post::all());

        $this->assertNotNull($post);
        $this->assertSame($post->slug, 'Slug');
        $this->assertSame($post->title, 'Title');
        $this->assertSame($post->body, 'Body');
    }

    /**
     * @test
     */
    public function userCanUpdateExistingPost()
    {
        $id = $this->setupDefaultPost()->id;
        $this->actingAs(User::createUser('admin', 'admin@admin.admin', 'password123'));

        $this->patch('/admin/post/' . $id, [
            'title' => 'Title2',
            'body' => 'Body2'
        ]);

        $post = Post::get()->first();

        $this->assertCount(1, Post::all());

        $this->assertNotNull($post);
        $this->assertSame($post->slug, 'Slug');
        $this->assertSame($post->title, 'Title2');
        $this->assertSame($post->body, 'Body2');
    }

    /**
     * @test
     */
    public function guestCanNotDeleteExistingPost()
    {
        $id = $this->setupDefaultPost()->id;

        $this->delete('/admin/post/' . $id);

        $post = Post::get()->first();

        $this->assertCount(1, Post::all());
    }

    /**
     * @test
     */
    public function userCanDeleteExistingPost()
    {
        $id = $this->setupDefaultPost()->id;
        $this->actingAs(User::createUser('admin', 'admin@admin.admin', 'password123'));

        $this->delete('/admin/post/' . $id);

        $this->assertCount(0, Post::all());
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
