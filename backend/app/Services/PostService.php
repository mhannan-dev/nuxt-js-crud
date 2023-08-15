<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function createPost(array $data)
    {
        return Post::create($data);
    }

    public function getAllPosts()
    {
        return Post::all();
    }

    
}
