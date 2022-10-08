<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Plumber'
        ]);
        Category::create([
            'name' => 'Carpenter'
        ]);
        Category::create([
            'name' => 'Painter'
        ]);
        Category::create([
            'name' => 'Delivery'
        ]);
        Category::create([
            'name' => 'Electrical'
        ]);
        Admin::create([
            'name' => 'sparky',
            'email' => 'admin@sparky.com',
            'password' => bcrypt('12332100')
        ]);
    }
}
