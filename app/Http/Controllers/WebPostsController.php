<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPostsController extends PostsController
{
    public function indexRoot()
    {
        return view(
            'index',
            ['posts' => $this->index()['posts']->take(5)]
        );
    }
    public function indexPosts()
    {
        return view(
            'posts',
            ['posts' => $this->index()['posts']]
        );
    }
    public function indexAdmin()
    {
        return view(
            'admin.admin',
            ['posts' => $this->index()['posts']]
        );
    }

    public function showWeb($slugOrId)
    {
        $postData = $this->getPostFromSlugOrId($slugOrId);

        return view(
            'post',
            [
                'title' => $postData->title,
                'body' => $postData->body,
                'id' => $postData->id
            ]
        );
    }

    public function create()
    {
        return view('admin.create-post');
    }

    public function edit($id)
    {
        $postData = $this->show($id);

        return view(
            'admin.edit-post',
            [
                'title' => $postData->title,
                'body' => $postData->body,
                'id' => $postData->id
            ]
        );
    }

    public function updateWeb(Request $request, $id)
    {
        $this->update($request, $id);
    }
    public function destroyWeb($id)
    {
        $this->destroy($id);
    }
    public function storeWeb(Request $request)
    {
        $this->store($request);
    }

    private function getPostFromSlugOrId($slugOrId)
    {
        if (is_numeric($slugOrId)) {
            return $this->show($slugOrId);
        }
        return $this->showSlug($slugOrId);
    }
}
