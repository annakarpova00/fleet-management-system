<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        Permission::create(['name' => 'create_fleets']);
        Permission::create(['name' => 'edit_fleets']);
        Permission::create(['name' => 'delete_fleets']);
        Permission::create(['name' => 'view_cars']);
        Permission::create(['name' => 'eddit_cars']);

        $managerRole = Role::create(['name' => 'Manager']);
        $driverRole = Role::create(['name' => 'Driver']);

        $managerRole->givePermissionTo(['create_fleets', 'edit_fleets', 'delete_fleets']);
        $driverRole->givePermissionTo(['view_cars', 'edit_cars']);
    }
}
