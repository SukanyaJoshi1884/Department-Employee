<?php 

namespace App\Repositories\Employees;
use Illuminate\Http\Request;

interface EmployeeInterface{ 
	
	/**
     * Get's a employee by it's ID
     *
     * @param int
     */
    public function get($id);


	/**
     * Get's all employee.
     *
     * @return $employee
     */
    public function all();


    /**
     * Save a employee.
     *
     * @param array
     */
    public function save(array $data);

    /**
     * Updates a employee.
     *
     * @param int
     * @param array
     */
    public function update($id,array $data);

    /**
     * Deletes a employee.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Get a employee with related data.
     *
     * @param int
     * @param array
     */
    public function getData($id,$with);

    /**
     * Get all employees with related data.
     *
     * @param int
     * @param array
     */
    public function allWith($with);
}