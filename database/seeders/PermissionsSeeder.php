<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Core\Models\Permission;
use App\Modules\Core\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'show user']);

        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo('edit user');
        $adminRole->givePermissionTo('delete user');
        $adminRole->givePermissionTo('create user');
        $adminRole->givePermissionTo('show user');

        $saRoles = Role::create(['name' => 'Super-Admin']);

        $users = User::query()->where('email', '<>', env('DEFAULT_USER_EMAIL'))->get();

        foreach ($users as $user) {
            $user->assignRole($adminRole);
        }

        //sa admin
        $saAdmin = User::query()->where('email', env('DEFAULT_USER_EMAIL'))->first();
        $saAdmin->assignRole($saRoles);
    }
}
