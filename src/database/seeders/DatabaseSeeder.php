<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::factory()->create([
            "name" => "Super Admin",
        ]);
        Role::factory()->create([
            "name" => "Admin",
        ]);
        Role::factory()->create([
            "name" => "User",
        ]);

        User::factory()->create([
            "login" => "superadmin",
            "email" => "superadmin@superadmin.superadmin",
            "password" => "superadmin",
            "role_id" => 1,
        ]);
        User::factory()->create([
            "login" => "admin",
            "email" => "admin@admin.admin",
            "password" => "admin",
            "role_id" => 2,
        ]);
        User::factory()->create([
            "login" => "user",
            "email" => "user@user.user",
            "password" => "user",
            "role_id" => 3,
        ]);


        User::factory(20)->create();
        Tag::factory(3)->create();
        Post::factory(20)->create();
    }
}
