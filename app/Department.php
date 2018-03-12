<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'office_number', 'manager'];

    /**
     * Get the employees record for the department.
     */
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
