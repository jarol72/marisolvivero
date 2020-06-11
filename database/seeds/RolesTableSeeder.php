<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class, 3)->create()/*->each(function ($role) {
            $role->users()->save(factory(App\User::class, 1)->make());
        })*/;

     /*    factory(App\Role::class, 2)->create()->each(function ($role) {
            $role->users()->save(factory(App\User::class, 3)->make());
        }); */
    }
}
