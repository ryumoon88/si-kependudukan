<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::findByName('Super-Admin', 'admin');
        $user = User::factory()->create([
            'id_number' => '1370000000000008',
            'citizen_id' => 1
        ]);

        $user->assignRole($super_admin);
    }
}
