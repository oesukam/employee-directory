<?php

use App\Employee;
use Illuminate\Database\Seeder;
class EmployeeTableSeeder extends Seeder {

    /**
     * Seed the departments table
     */
    public function run()
    {
        factory(Employee::class, 10)->create();
    }
}