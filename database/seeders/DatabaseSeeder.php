<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            ['name'=>'head_of_the_department',
            'username' =>'adminWard21',
            'user_position' => 'head',  
            'password' =>Hash::make('admin123'),
            'mobile' => '021456789',
            'role' => 'superadmin'
        ]);
    }
}
