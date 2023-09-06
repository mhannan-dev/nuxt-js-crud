<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromQuery, WithHeadings
{
    protected $categoryId;
    protected $status;

    public function __construct($categoryId = null, $status = null)
    {
        $this->categoryId = $categoryId;
        $this->status = $status;
    }

    public function query()
    {
        $query = Post::query()
            ->with('category')
            ->select(
                'categories.title as category_name',
                'posts.title',
                'posts.description',
                DB::raw('(CASE WHEN posts.status = 1 THEN "Active" ELSE "Inactive" END) as status')
            )
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id');

        if ($this->categoryId) {
            $query->where('category_id', $this->categoryId);
        }
        if ($this->status) {
            $query->where('status', $this->status);
        }
        return $query;
    }

    public function headings(): array
    {
        $categoryTitles = Category::pluck('title')->toArray();
        
        return [
            'Category',
            'Title',
            'Description',
            'Status',
        ] + $categoryTitles;
    }
}
