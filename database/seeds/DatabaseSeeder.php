<?php

use Illuminate\Database\Seeder;

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
            'name' => 'student',
            'email' => 'student@student.pl',
            'password' => bcrypt('student123'),
        ]);
    }
}
