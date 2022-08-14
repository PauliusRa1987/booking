<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Lokis',
            'email' => 'lokis@gmail.com' ,
            'password' => Hash::make('123'),
            'role' => 10,
        ]);
        DB::table('users')->insert([
            'name' => 'Zuikis',
            'email' => 'zuikis@gmail.com' ,
            'password' => Hash::make('123')
        ]);
        
        
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
