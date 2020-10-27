<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPostsController extends PostsController
{
    public function listRoot()
    {
        return view(
            'root',
            ['posts' => $this->list()['posts']]
        );
    }
}
