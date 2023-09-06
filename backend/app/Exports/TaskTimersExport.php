<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class TaskTimersExport implements FromCollection
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Project ID',
            'Task ID',
            'Start Time',
            'End Time',
            'Duration',
        ];
    }
}
