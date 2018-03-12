<?php

use App\Department;
use Illuminate\Database\Seeder;
class DepartmentTableSeeder extends Seeder {

    /**
     * Seed the departments table
     */
    public function run()
    {
        factory(Department::class, 5)->create();
    }
}