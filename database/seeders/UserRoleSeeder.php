<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roleaccesses')->insert([
            ['role_name'=>'teacher'],
            ['role_name'=>'student'],
            ['role_name'=>'guest']
        ]);
    }
}
