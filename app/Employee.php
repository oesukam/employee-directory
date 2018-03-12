<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'job_title', 'cellphone', 'email'];

    /**
     * Get the employee record that belongs to the department.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
