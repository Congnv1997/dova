<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'teonv@gmail.com',
            'staff_id'=>'1',
            'password' => bcrypt('16031999'),
      ]);
    }
}
