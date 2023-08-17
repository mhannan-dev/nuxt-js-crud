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
    public function getPostById($postId)
    {
        return Post::find($postId);
    }

    public function updatePost($postId, $data)
    {
        $post = Post::findOrFail($postId);
        $post->update($data);
        return $post;
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();
    }

}
