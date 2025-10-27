<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // カテゴリーを先に作成
        $this->call(CategoriesTableSeeder::class);

        // 35件のコンタクトダミーデータを作成
        Contact::factory(35)->create();
    }
}
