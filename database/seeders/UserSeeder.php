<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name' => "John Doe",
            'email' => "john.doe@example.com",
            'password' => bcrypt("password"),
        ]);
        for($i = 0; $i <= 10; $i++) {
            User::create([
                'name' => fake("id_ID")->name(),
                'email' => fake("id_ID")->email(),
                'password' => bcrypt("password"),
            ]);
        }
    }
    
}
