<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create(['id' => 1, 'name' => 'Admin', 'description' => 'Administrators' ]);
        Group::create(['id' => 2, 'name' => 'Exec', 'description' => 'Executives' ]);
        Group::create(['id' => 3, 'name' => 'Mgr', 'description' => 'Managers' ]);
        Group::create(['id' => 4, 'name' => 'Sup', 'description' => 'Supervisors' ]);
        Group::create(['id' => 5, 'name' => 'Emp', 'description' => 'Employees' ]);
    }
}
