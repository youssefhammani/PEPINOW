<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsUser::factory()->count(1)
        ->create()
        ->each(
            function($user) {
                $user->assignRole('admin');
            });
            
        ModelsUser::factory()->count(2)
        ->create()
        ->each(
            function($user) {
                $user->assignRole('seller');
            }
        );
    }
}
