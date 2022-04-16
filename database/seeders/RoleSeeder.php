<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role'=>'Administrator',
            'slug-role'=>'slug-administrator'
        ]);

        DB::table('roles')->insert([
            'role'=>'Compagny',
            'slug-role'=>'slug-compagny'
        ]);

        DB::table('roles')->insert([
            'role'=>'Freelancer',
            'slug-role'=>'slug-freelancer'
        ]);
    }
}
