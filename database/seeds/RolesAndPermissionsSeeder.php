<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit_post']);
        Permission::create(['name' => 'delete_post']);
        Permission::create(['name' => 'create_post']);

        // create roles and assign created permissions

        // User writer
        $role = Role::create(['name' => 'writer'])->givePermissionTo(['create_post']);

        // User super-admin
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        $user = User::find(1);
        $user->assignRole('super-admin');

        DB::table('users')->insert([
            'name' => 'writer',
            'email' => 'writer@gmail.com',
            'password' => bcrypt('writer'),
        ]);

        $user = User::find(2);
        $user->assignRole('writer');

    }
}
