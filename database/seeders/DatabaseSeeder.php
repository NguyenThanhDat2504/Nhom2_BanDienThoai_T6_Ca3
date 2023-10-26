<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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


        $seedData = Storage::disk('local')->get('seed/data.json');
        $seedDataDecoded = json_decode($seedData);

        $roles = $seedDataDecoded->roles;
        foreach ($roles as $role) {
            Role::create([
                'id' => $role->id,
                'name' => $role->name
            ]);
        }

        $users = $seedDataDecoded->users;
        foreach($users as $user) {
            User::create([
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'password' => $user->password,
                'created_at' => $user->createdAt,
                'updated_at' => $user->updatedAt,
                'role_id' => $user->role_id
            ]);
        }

        $categories = $seedDataDecoded->categories;
        foreach($categories as $category) {
            Category::create([
                'id' => $category->id,
                'title' => $category->title,
                'slug' => $category->slug
            ]);
        }
    }
}
