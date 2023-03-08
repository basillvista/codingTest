<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Role::create([
                'name' => 'user',
                'display_name' => 'user',
                'description' => 'Users role',
            ]);
            Role::create([
                'name' => 'admin',
                'display_name' => 'admin',
                'description' => 'admins role',
            ]);
        });


        User::factory(1000)->create()->each(function ($user) {
            $user->attachUserRoleForUser();
        });

        Customer::factory(1000)->create();

        User::factory(3)->create()->each(function ($user){
            $user->attachAdminRoleForUser();
        });
    }
}
