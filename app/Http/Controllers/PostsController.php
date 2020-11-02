<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return ['posts' => $posts];
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        return $post;
    }

    public function showSlug($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return $post;
    }

    public function store(Request $request)
    {
        $postResult = Post::createPost(
            $request->validate([
                'slug' => 'required',
                'title' => 'required',
                'body' => 'required'
            ])
        );

        return ['post' => $postResult];
    }

    public function update(Request $request, $id)
    {
        $postResult = Post::where('id', $id)->firstOrFail();
        $postResult->updatePost($request);

        return $postResult;
    }

    public function destroy($id)
    {
        $postResult = Post::where('id', $id);

        $postResult->delete();
    }
}
