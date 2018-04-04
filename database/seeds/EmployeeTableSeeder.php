<?php

use App\Employee;
use Illuminate\Database\Seeder;
class EmployeeTableSeeder extends Seeder {

    /**
     * Seed the departments table
     */
    public function run()
    {
        //factory(Employee::class, 10)->create();
        //DB::table('employees')->truncate();

        DB::table('employees')->insert([
            'department_id'         => 1,
            'name'                  => 'Malisa P.',
            'job_title'             => 'Technitian',
            'cellphone'            => '1320000000',
            'email'                 => 'malisa@email.com',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}