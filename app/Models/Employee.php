<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * Name of the table
     *
     * @var string
     */
    protected $table = 'table_employee';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','email','dept_id'
    ];

    /**
     * Get the department for employee.
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Departments','dept_id');
    }

    public function employees_contacts()
    {
        return $this->hasMany('App\Models\EmployeeContacts','emp_id');
    }
    
}
