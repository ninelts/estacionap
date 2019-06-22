<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
           	$user->name ='prueba';
            $user->email ='prueba@prueba.cl';
            $user->password = Hash::make('Prueba@123');
            $user->rut = '123456789';
            $user->last_name = 'pruebas';
            $user->phone = 123456789;
            $user->born = '2000-06-21';
            $user->save(); 
            $user->roles()->attach(2);
    }
}
