<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class AdminCredentialsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@blog.com',
            'password' => bcrypt('admin@123'),
            'isAdmin' => 'yes'
        ]);
    }
}
