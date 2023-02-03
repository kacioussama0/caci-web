<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $owner = User::create([
            'name' => 'Kaci Oussama',
            'email' => 'contact@kacioussama.com',
            'password' => bcrypt('azerkaci2013'),
            'approved' => 1,
            'avatar' => ''
        ]);

        $owner -> attachRole(Role::find(1));

        $moderator = User::create([
            'name' => 'Seggar Zakaria',
            'email' => 'zakari0002@gmail.com',
            'password' => bcrypt('azerkaci2013'),
            'approved' => 1,
            'avatar' => ''
        ]);

        $moderator -> attachRole(Role::find(2));


    }
}
