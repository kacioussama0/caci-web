<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kaci Oussama',
            'email' => 'contact@kacioussama.com',
            'password' => bcrypt('azerkaci2013'),
            'type' => 'Super Admin',
            'approved' => 1,
            'avatar' => ''
        ]);
    }
}
