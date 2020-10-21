<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    static public function createPost($postData)
    {
        $result = new Post;
        $result->slug = $postData['slug'];
        $result->title = $postData['title'];
        $result->body = $postData['body'];
        $result->save();
        return $result;
    }

    public function updatePost(Request $postData)
    {
        if ($postData->has('title')) {
            $this->title = $postData->title;
        }
        if ($postData->has('body')) {
            $this->body = $postData->body;
        }

        $this->save();

        return $this;
    }
}
