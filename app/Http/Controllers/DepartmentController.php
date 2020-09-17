<?php

namespace App\Http\Controllers;
use App\Repositories\Departments\DepartmentInterface as DepartmentInterface;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $departmentRepository;

    public function __construct(DepartmentInterface $departmentRepository)
    {
       $this->departmentRepository = $departmentRepository;
    }

    /**
     * Function to display all the departments
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->departmentRepository->all();
        if(count($departments)>0)
        {
            return response()
            ->json(['data' => $departments], 200); 
        }
        else
        {
            return response()
            ->json(['message' => 'No data found'], 404); 
        }
    }

     /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //validate form fields
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = $request->all();
        $create = $this->departmentRepository->save($data);
        if($create)
            return response()
            ->json(['result' => $create, 'message'=>'Department created'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $showDepartment = $this->departmentRepository->get($id);
        if($showDepartment)
            return response()
            ->json(['result' => $showDepartment], 200);
        else
            return response()
            ->json(['message' => 'No data found'], 404); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate form fields
        $this->validate($request, [
            'name' => 'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
