<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPostsController extends PostsController
{
    public function indexRoot()
    {
        return view(
            'root',
            ['posts' => $this->index()['posts']->take(5)]
        );
    }
    public function indexAdmin()
    {
        return view(
            'admin',
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
        return view('create-post');
    }

    public function edit($id)
    {
        $postData = $this->show($id);

        return view(
            'edit-post',
            [
                'title' => $postData->title,
                'body' => $postData->body,
                'id' => $postData->id
            ]
        );
    }

    private function getPostFromSlugOrId($slugOrId)
    {
        if (is_numeric($slugOrId)) {
            return $this->show($slugOrId);
        }
        return $this->showSlug($slugOrId);
    }
}
