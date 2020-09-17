<?php 

namespace App\Repositories\Employees;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Repositories\Employees\EmployeeInterface as EmployeeInterface;

class EmployeeRepository implements EmployeeInterface
{
    // model property on class instances
    public $model;

    // Constructor to bind model to repo
    function __construct(Employee $model)
    {
        $this->model = $model;
    }

    public function get($id)
    {
        return Employee::find($id);
    }

    // Get all instances of model
    public function all()
    {
        return Employee::all();
    }

    // create a new record in the database
    public function save(array $data)
    {
        return Employee::create($data);
    }

    // update record in the database
    public function update( $id,array $data)
    {
        $record = Employee::find($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return Employee::destroy($id);
    }

    //get data with relation table
    public function getData($id,$with)
    {
        return Employee::with($with)->where(['id'=>$id])->first();
    }

    // Get all instances of model with relation
    public function allWith($with)
    {
        return Employee::with($with)->get();
    }

    
}