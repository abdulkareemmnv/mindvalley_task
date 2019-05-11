<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$r36tuoLiCqMQP/shK/88S.JsUPkv4VQeE5YS4HoAZclM.ud4ufNWa', // admin
            'remember_token' => str_random(10),
        ]);
    }
}
