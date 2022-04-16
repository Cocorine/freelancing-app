<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category'=>'Development',
            'slug-category'=>'slug-development'
        ]);

        DB::table('categories')->insert([
            'category'=>'Design',
            'slug-category'=>'slug-design'
        ]);

        DB::table('categories')->insert([
            'category'=>'Boostage',
            'slug-category'=>'slug-boostage'
        ]);

        DB::table('categories')->insert([
            'category'=>'Marketing',
            'slug-category'=>'slug-marketing'
        ]);

    }
}
