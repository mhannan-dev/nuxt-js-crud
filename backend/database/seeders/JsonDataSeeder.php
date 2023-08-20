<?php

namespace Database\Seeders;

use App\Models\JsonDataModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JsonDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JsonDataModel::create([
            'title' => "Headline",
            'content' => '"[{\"headline\":\"Repellendus Vero do\",\"description\":\"Doloribus enim volup\"},{\"headline\":\"Adipisicing aut non\",\"description\":\"Et rem quis elit lo\"},{\"headline\":\"Fugiat atque facere\",\"description\":\"Ut dolor Nam ea dolo\"},{\"headline\":\"Voluptates rem verit\",\"description\":\"Lorem quam molestias\"},{\"headline\":\"Rerum sit blanditiis\",\"description\":\"Quae in laborum et s\"},{\"headline\":\"Beatae non duis ex r\",\"description\":\"Fuga Quia minima iu\"},{\"headline\":\"Quod sunt irure et c\",\"description\":\"Non quia vel est err\"},{\"headline\":\"Non pariatur Conseq\",\"description\":\"Sed quis sit adipis\"}]"',
        ]);
    }
}
