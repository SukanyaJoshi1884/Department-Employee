<?php 

namespace App\Repositories\Departments;
use Illuminate\Http\Request;

interface DepartmentInterface{ 
	
	/**
     * Get's a department by it's ID
     *
     * @param int
     */
    public function get($id);


	/**
     * Get's all department.
     *
     * @return $department
     */
    public function all();


    /**
     * Save a department.
     *
     * @param array
     */
    public function save(array $data);

    /**
     * Updates a department.
     *
     * @param int
     * @param array
     */
    public function update($id,array $data);

    /**
     * Deletes a department.
     *
     * @param int
     */
    public function delete($id);
}