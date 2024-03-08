<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class OrganisatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $User=  User::create([
            'name' => 'organisator',
            'email' => 'organisator@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
           ]);
           $User->assignRole('organisator');
    }
}
