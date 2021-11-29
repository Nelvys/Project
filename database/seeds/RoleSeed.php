<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Role::where('name', 'SuperAdmin')->first()){
            //create Admin role
            $role = new Role();
            $role ->name = 'SuperAdmin';
            $role->display_name='superadmin';
            $role->description='todos los privilegios';
            $role ->save();
        }
        if(!Role::where('name', 'Responsable')->first()){
            //create Responsable role
            $role = new Role();
            $role ->name = 'Responsable';
            $role->display_name='responsable';
            $role->description='privilegios restringidos';

            $role ->save();
        }
        if(!Role::where('name', 'Trabajador')->first()){
            //create Worker role
            $role = new Role();
            $role ->name = 'Trabajador';
            $role->display_name='trabajador';
            $role->description='privilegios restringidos';

            $role ->save();
        }

    }

}
