<?php 

namespace App\Repositories\Departments;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departments;
use App\Repositories\Departments\DepartmentInterface as DepartmentInterface;

class DepartmentRepository implements DepartmentInterface
{
    // model property on class instances
    public $model;

    // Constructor to bind model to repo
    function __construct(Departments $model)
    {
        $this->model = $model;
    }

    public function get($id)
    {
        return Departments::find($id);
    }

    // Get all instances of model
    public function all()
    {
        return Departments::all();
    }

    // create a new record in the database
    public function save(array $data)
    {
        return Departments::create($data);
    }

    // update record in the database
    public function update( $id,array $data)
    {
        $record = Departments::find($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return Departments::destroy($id);
    }

    
}