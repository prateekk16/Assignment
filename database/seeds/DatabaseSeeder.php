<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();
        DB::table('roles')->delete();

        $user = new User;
        $user->email = "admin@test.com";
        $user->password = bcrypt("admin");
        $user->username = "admin";
        $user->name = "Admin";
        $user->save();

        $role = new Role;
        $role->name = "admin";
        $role->label = "Site Administrator";
        $role->save();

        $user->roles()->save($role);

        Model::reguard();
    }
}
