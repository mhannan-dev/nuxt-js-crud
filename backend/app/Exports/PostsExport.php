<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PostsExport implements FromQuery, WithHeadings, WithStyles
{
    use Exportable;
    protected $categoryId;
    protected $status;
    protected $to;
    protected $from;

    public function __construct($categoryId = null, $status = null, $to = null, $from = null)
    {
        $this->categoryId = $categoryId;
        $this->status = $status;
        $this->to = $to;
        $this->from = $from;
    }


    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getFont()->getColor()->setARGB('FF0000');
        $sheet->getStyle('A1')->getFill()->setFillType('solid')->getStartColor()->setARGB('FFFF00');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
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
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->when($this->categoryId != null, function ($query) {
                return $query->where('category_id', $this->categoryId);
            })
            ->when($this->status != null, function ($query) {
                return $query->where('status', $this->status);
            })
            // ->when($to != null && $from != null, function ($query) use ($from, $to) {
            //     $query->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59']);
            // })
            ;
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
