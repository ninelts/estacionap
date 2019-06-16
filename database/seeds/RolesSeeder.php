<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$roles = new Role();
    	$roles->name = 'admin';
    	$roles->description = 'Cuenta de administrador';
    	$roles->save();


    	$roles = new Role();
    	$roles->name = 'usu';
    	$roles->description = 'Cuenta de usuario';
    	$roles->save();
    }
}
