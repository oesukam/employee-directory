<?php

use App\Department;
use Illuminate\Database\Seeder;
class DepartmentTableSeeder extends Seeder {

    /**
     * Seed the departments table
     */
    public function run()
    {
        //factory(Department::class, 5)->create();
        //DB::table('departments')->truncate();

        DB::table('departments')->insert([
            'name'                  => 'IT',
            'office_number'         => '2700000',
            'manager'               => 'Dr. GUI HAO',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('departments')->insert([
            'name'                  => 'Finance',
            'office_number'         => '4000000',
            'manager'               => 'Dr. Ronald',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}