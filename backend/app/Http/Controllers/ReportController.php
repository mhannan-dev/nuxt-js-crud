<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Exports\PostsExport;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
        $categoryId = $request->input('category_id');
        $status = $request->input('status');
        return Excel::download(new PostsExport($categoryId, $status), 'post.csv');
    }
}
