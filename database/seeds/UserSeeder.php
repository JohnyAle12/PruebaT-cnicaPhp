<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Johny Prieto';
        $user->email = 'johny@mail.com';
        $user->password = bcrypt('johny2020');
        $user->save();
        //$user->roles()->attach($role_admin);
    }
}
