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
            'resident_id' => 1,
            'email' => 'naufalhady6@gmail.com'
        ]);
        $user->assignRole($super_admin);
        $user = User::factory()->create([
            'id_number' => '1370000000000002',
            'resident_id' => 2,
            'email' => 'jilhanhaura@gmail.com'
        ]);
        $user->assignRole($super_admin);

        // for ($i = 2; $i <= 500; $i++) {
        //     User::factory()->create(['resident_id' => $i]);
        // }
    }
}