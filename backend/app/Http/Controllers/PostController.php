<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostCreate;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return response()->json(['message' => 'Posts fetched successfully', 'posts' => $posts], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreate $request)
    {
        $data = $request->validated();
        $post = $this->postService->createPost($data);
        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->postService->getPostById($id);
        return response()->json(['message' => 'Post fetched successfully', 'post' => $post], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $post = $this->postService->updatePost($id, $request->all());
        return response()->json(['message' => 'Post updated successfully', 'post' => $post], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->postService->deletePost($id);
        return response()->json(['message' => 'Post deleted successfully'], 201);
    }
}
