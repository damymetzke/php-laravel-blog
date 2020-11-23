<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make(
            $request->all(),
            [
                'slug' => 'required',
                'title' => 'required',
                'body' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json([], 403);
        }
        $postResult = Post::createPost($request->all());

        return [
            'success' => true,
            'post' => $postResult
        ];
    }

    public function update(Request $request, $id)
    {
        $postResult = Post::where('id', $id)->firstOrFail();
        $postResult->updatePost($request);

        return [
            'success' => true,
            'post' => $postResult
        ];
    }

    public function destroy($id)
    {
        $postResult = Post::where('id', $id);

        $postResult->delete();
        return ['success' => true];
    }
}
