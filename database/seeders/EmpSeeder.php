<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Employee;
use App\Models\User;
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
            'name' => 'create',
            'category_id' => 1
        ]);
        Category::create([
            'name' => 'maintain',
            'category_id' => 1
        ]);
        Category::create([
            'name' => 'Carpenter'
        ]);
        Category::create([
            'name' => 'maintain',
            'category_id' => 2
        ]);
        Category::create([
            'name' => 'create',
            'category_id' => 2
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
        User::create([
            'chat_id' => '1',
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('12332100'),
            'phone' => '01124928786'
        ]);
        Employee::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('12332100'),
            'phone' => '01124928786'
        ]);
    }
}
