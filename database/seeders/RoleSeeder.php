<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Uralia',
            'email'=> 'uraliak@mail.ru',
            'password'=>Hash::make('!KUS2004!'),
            'role'=> 'moderator',
        ]);

        User::create([
            'name'=> 'Uralia',
            'email'=> 'reader@mail.ru',
            'password'=>Hash::make('!KUS2004!'),
            'role'=> 'reader',
        ]);
    }
}
