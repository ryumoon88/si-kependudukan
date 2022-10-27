<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            PermissionSeeder::class
        ]);
        $user = User::factory()->create([
            'name' => "Naufal Hady",
            'username' => 'ryumoon'
        ]);

        $user->assignRole(Role::findByName('Super-Admin', 'admin'));

        $user = User::factory()->create([
            'name' => 'Tsalsabila Jilhan Haura',
            'username' => 'jilhan'
        ]);

        $user->assignRole(Role::findByName('Super-Admin', 'admin'));

        $user = User::factory()->create([
            'name' => 'Nelly Sintia Yanti',
            'username' => 'sintia'
        ]);

        $user->assignRole(Role::findByName('Super-Admin', 'admin'));

        User::factory()->create([
            'name' => 'Pavao Slavco',
            'username' => 'test_user'
        ]);
    }
}
