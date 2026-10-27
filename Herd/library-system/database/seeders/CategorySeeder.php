<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Filsafat']);
        Category::create(['name' => 'Politik & Pergerakan']);
        Category::create(['name' => 'Sejarah']);
        Category::create(['name' => 'Sastra & Fiksi']);
    }
}