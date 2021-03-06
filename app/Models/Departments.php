<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    /**
     * Name of the table
     *
     * @var string
     */
    protected $table = 'table_department';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the employees for the departmant.
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
    
    
}
