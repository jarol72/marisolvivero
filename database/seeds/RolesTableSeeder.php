<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'Administrador',
        ]);
        
        Role::create([
            'role' => 'Empleado',
        ]);

        Role::create([
            'role' => 'Cliente',
        ]);
    }
}
