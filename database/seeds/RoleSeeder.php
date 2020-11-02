<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = New Role();
        $role->name = "Administrator";
        $role->description = "Administrador con todos los privilegios";
        $role->save();

        $role = New Role();
        $role->name = "User";
        $role->description = "Usuario de registro de la plataforma";
        $role->save();

        $role = New Role();
        $role->name = "Customer";
        $role->description = "Usuario de cliente con privilegio de consultar y modificar su propia información";
        $role->save();
    }
}
