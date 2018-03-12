<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
//        $this->call('DepartmentTableSeeder');
        $this->call('EmployeeTableSeeder');

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name'   => 'Admin',
            'email'      => 'malisa@whu.edu.cn',
            'password'   => bcrypt('123456'),
			'first_login' => 'false',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}