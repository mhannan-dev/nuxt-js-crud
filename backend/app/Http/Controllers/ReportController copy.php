<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
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
        $data['posts'] = $this->postService->getAllPosts();
        $data['categories'] = Category::all();
        return view('post.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function report(Request $request)
    {
        $query = Post::with('category')->select('id', 'category_id', 'status')
        ->when($request->has('category_id'), function ($query) use ($request) {
            return $query->where('category_id', $request->input('category_id'));
        })
        ->when($request->has('status'), function ($query) use ($request) {
            return $query->where('status', $request->input('status'));
        });
        $data = $query->get()->toArray();
        $columns = ['Category', 'Status'];
        $filename = time().'.csv';

        $response = new Response(view('post.csv', [
            'columns' => $columns,
            'data' => $data,
        ]));


        $response->header('Content-Type', 'text/csv');
        $response->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        return $response;

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
