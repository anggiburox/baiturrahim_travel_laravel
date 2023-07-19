<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['Username' => 'admin', 'Password' =>'travel', 'ID_User_Roles'=>'1'],
            ['Username' => 'pimpinan', 'Password' =>'pimpinan123', 'ID_User_Roles'=>'3'],
        ]);

        DB::table('users_roles')->insert([
            ['Role' => 'Admin'],
            ['Role' => 'Jamaah'],
            ['Role' => 'Pimpinan'],
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
