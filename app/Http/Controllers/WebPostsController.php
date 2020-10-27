<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPostsController extends PostsController
{
    public function listRoot()
    {
        return view(
            'root',
            ['posts' => $this->list()['posts']->take(5)]
        );
    }

    public function showWeb($slugOrId)
    {
        $postData = [];
        if (is_numeric($slugOrId)) {
            $postData = $this->show($slugOrId);
        } else {
            $postData = $this->showSlug($slugOrId);
        }

        return view(
            'post',
            [
                'title' => $postData->title,
                'body' => $postData->body
            ]
        );
    }
}
