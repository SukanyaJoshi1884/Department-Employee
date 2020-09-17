<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeContacts extends Model
{
    /**
     * Name of the table
     *
     * @var string
     */
    protected $table = 'table_employee_contact';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_id','address','contact_number'
    ];

    /**
     * Get the contacts for employee.
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','id','emp_id');
    }
    
}
