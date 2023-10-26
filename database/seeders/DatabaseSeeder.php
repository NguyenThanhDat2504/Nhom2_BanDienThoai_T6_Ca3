<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Level;
use App\Models\OrderStatus;
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

        $levels = $seedDataDecoded->categories;
        foreach($levels as $level) {
            Category::create([
                'id' => $level->id,
                'title' => $level->title,
                'slug' => $level->slug
            ]);
        }

        $orderStatuses = $seedDataDecoded->orderStatuses;
        foreach($orderStatuses as $orderStatus) {
            OrderStatus::create([
                'id' => $orderStatus->id,
                'title' => $orderStatus->title,
            ]);
        }

        $levels = $seedDataDecoded->levels;
        foreach($levels as $level) {
            Level::create([
                'id' => $level->id,
                'title' => $level->title,
                'target' => $level->target,
                'discount' => $level->discount
            ]);
        }
    }
}
