<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 200)->create()->each(function($u) {
            $u->address()->save(factory(App\Address::class)->make());
        });
    }
}
