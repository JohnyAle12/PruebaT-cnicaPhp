<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Customer;

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
        $user->email = 'johnyprieto001@gmail.com';
        $user->password = bcrypt('johny2020');
        $user->save();
        //$user->roles()->attach($role_admin);

        //ejecutamos los factories
        factory(User::class, 5000)->create([
            'slug' => 'Hola bebe',
        ]);

        factory(Customer::class, 50)->create();


    }
}
