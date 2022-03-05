<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Pubblicatore',
            'email' => 'publish@publish.com',
            'email_verified_at' => now(),
            'password' => Hash::make('publish'),
            'remember_token' => Str::random(10),
            'role_id' => 3,
        ]);

        $this->call(CategorySeeder::class);
    }
}
