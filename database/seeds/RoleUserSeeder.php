<?php

use Illuminate\Database\Seeder;
use App\Models\Role_user;
use App\Models\User;
use App\Models\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin= Role::where('name', 'Administrator')->first();
    	$user = User::where('email', 'johny@mail.com')->first();

        $role_user = new Role_user();
        $role_user->user_id = $user->id;
        $role_user->role_id = $role_admin->id;
        $role_user->save();
    }
}
