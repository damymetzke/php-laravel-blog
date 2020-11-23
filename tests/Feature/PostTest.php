<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function canCreatePost()
    {
        $this->setupDefaultState();

        sleep(1);

        $this->post('/admin/post', [
            'slug' => 'Slug2',
            'title' => 'Title2',
            'body' => 'Body2'
        ]);

        $posts = Post::latest()->get();

        $this->assertNotNull($posts[0]);
        $this->assertSame($posts[0]->slug, 'Slug2');
        $this->assertSame($posts[0]->title, 'Title2');
        $this->assertSame($posts[0]->body, 'Body2');

        $this->assertNotNull($posts[1]);
        $this->assertSame($posts[1]->slug, 'Slug');
        $this->assertSame($posts[1]->title, 'Title');
        $this->assertSame($posts[1]->body, 'Body');
    }

    /**
     * @test
     */
    public function slugIsRequiredWhenCreatingPost()
    {
        $this->actingAs(User::createUser('admin', 'admin@admin.admin', 'password123'));

        $correctResponse = $this->post('/admin/post', [
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body'
        ]);

        $incorrectResponse = $this->post('/admin/post', [
            'title' => 'Title',
            'body' => 'Body'
        ]);

        $correctResponse->assertOk();
        $incorrectResponse->assertStatus(400);
    }

    /**
     * @test
     */
    public function titleIsRequiredWhenCreatingPost()
    {
        $this->actingAs(User::createUser('admin', 'admin@admin.admin', 'password123'));

        $correctResponse = $this->post('/admin/post', [
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body'
        ]);

        $incorrectResponse = $this->post('/admin/post', [
            'slug' => 'Slug',
            'body' => 'Body'
        ]);

        $correctResponse->assertOk();
        $incorrectResponse->assertStatus(400);
    }

    /**
     * @test
     */
    public function bodyIsRequiredWhenCreatingPost()
    {
        $this->actingAs(User::createUser('admin', 'admin@admin.admin', 'password123'));

        $correctResponse = $this->post('/admin/post', [
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body'
        ]);

        $incorrectResponse = $this->post('/admin/post', [
            'slug' => 'Slug',
            'title' => 'Title',
        ]);

        $correctResponse->assertOk();
        $incorrectResponse->assertStatus(400);
    }

    /**
     * @test
     */
    public function canViewPostUsingId()
    {
        $post = $this->setupDefaultState();

        $correctResponse = $this->get('/post/' . $post->id);
        $incorrectResponse = $this->get('/post/9001');

        $correctResponse->assertOk();
        $incorrectResponse->assertStatus(404);
    }

    /**
     * @test
     */
    public function canViewPostUsingSlug()
    {
        $post = $this->setupDefaultState();

        $correctResponse = $this->get('/post/' . $post->slug);
        $incorrectResponse = $this->get('/post/this-slug-should-never-exist');

        $correctResponse->assertOk();
        $incorrectResponse->assertStatus(404);
    }

    /**
     * @test
     */
    public function canViewRoot()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function canViewPosts()
    {
        $response = $this->get('/posts');

        $response->assertOk();
    }

    private function setupDefaultState()
    {
        $this->actingAs(User::createUser('admin', 'admin@admin.admin', 'password123'));

        return Post::createPost([
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body'
        ]);
    }
}
