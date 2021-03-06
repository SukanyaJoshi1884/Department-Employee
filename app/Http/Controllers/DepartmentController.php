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
     /**
     * @api {get} /department List department data
     * @apiName department
     * @apiGroup Departments
     *
     * @apiSuccess {Number} id ID of department.
     * @apiSuccess {String} name  Name of department.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "status": "Success",
                "data": [
                    {
                        "id": 1,
                        "name": "mechanical",
                        "created_at": "2020-09-16T17:17:32.000000Z",
                        "updated_at": "2020-09-17T13:45:28.000000Z"
                    },
                    {
                        "id": 3,
                        "name": "Admin",
                        "created_at": "2020-09-17T13:40:07.000000Z",
                        "updated_at": "2020-09-17T13:40:07.000000Z"
                    },
                    {
                        "id": 4,
                        "name": "Admin",
                        "created_at": "2020-09-17T13:44:28.000000Z",
                        "updated_at": "2020-09-17T13:44:28.000000Z"
                    },
                    {
                        "id": 5,
                        "name": "Admin",
                        "created_at": "2020-09-17T13:55:32.000000Z",
                        "updated_at": "2020-09-17T13:55:32.000000Z"
                    }
                ]
            }
     *
     */
    public function index()
    {
        $departments = $this->departmentRepository->all();
        if(count($departments)>0)
        {
            return response()
            ->json(['status'=>'Success','data' => $departments], 200); 
        }
        else
        {
            return response()
            ->json(['status'=>'Failed','message' => 'No data found'], 404); 
        }
    }

     /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @api {post} /department Create new department data
     * @apiName create-department
     * @apiGroup Departments
     * @apiParam {String} name Name of department
     * @apiSuccess {Number} id ID of department.
     * @apiSuccess {String} name  Name of department.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
           {
                "status": "Success",
                "result": {
                    "name": "Admin",
                    "updated_at": "2020-09-17T13:55:32.000000Z",
                    "created_at": "2020-09-17T13:55:32.000000Z",
                    "id": 5
                },
                "message": "Department created"
            }
     *      
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 422 Unprocessable Entity
            {
                "name": [
                    "The name field is required."
                ]
            }
     *
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
            ->json(['status'=>'Success','result' => $create, 'message'=>'Department created'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @api {get} /department/{id} Show department data
     * @apiName show-department
     * @apiGroup Departments
     * @apiParam {Number} id ID of department
     * @apiSuccess {Number} id ID of department.
     * @apiSuccess {String} name  Name of department.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
            {
                "status": "Success",
                "result": {
                    "id": 5,
                    "name": "Admin",
                    "created_at": "2020-09-17T13:55:32.000000Z",
                    "updated_at": "2020-09-17T13:55:32.000000Z"
                }
            }
     *      
     *
     * @apiError Not found The id of the department was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *        "status": "Failed",
     *       "message": "No data found"
     *     }
     */
    public function show($id)
    {

        $showDepartment = $this->departmentRepository->get($id);
        if($showDepartment)
            return response()
            ->json(['status'=>'Success','result' => $showDepartment], 200);
        else
            return response()
            ->json(['status'=>'Failed','message' => 'No data found'], 404); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @api {post} /department/{id} Update department data
     * @apiName update-department
     * @apiGroup Departments
     * @apiParam {String} name Name of department
     * @apiSuccess {Number} id ID of department.
     * @apiSuccess {String} name  Name of department.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
           {
                "status": "Success",
                "result": {
                    "id": 1,
                    "name": "mechanical",
                    "created_at": "2020-09-16T17:17:32.000000Z",
                    "updated_at": "2020-09-17T13:45:28.000000Z"
                }
            }
     *      
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *        "status":"Failed",
     *       "message": "No data found"
     *     }

     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Unable to update data
     *     {
     *         "status":"Failed",
     *       "message": "Unable to update data"
     *     }
     *
     */
    public function update(Request $request, $id)
    {
        //validate form fields
        $this->validate($request, [
            'name' => 'required',
        ]);
        $data = $request->all();
        $checkDepartment = $this->departmentRepository->get($id);
        if($checkDepartment)
        {
            $updateDepartment = $this->departmentRepository->update($id,$data);
            if($updateDepartment){
                $newData = $this->departmentRepository->get($id);
                return response()
                ->json(['status'=>'Success','result' => $newData], 200);
            }    
            else
                return response()
                ->json(['status'=>'Failed','message' => 'Unable to update data'], 400);
        }
        else
            return response()
            ->json(['status'=>'Failed','message' => 'Department not found'], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @api {delete} /department/{id} Delete department
     * @apiName delete-department
     * @apiGroup Departments
     * @apiSuccessExample Success-Response:
     *  HTTP/1.1 200 Success
     *     {
     *       "status":"Success",
     *       "message": "Deleted successfully"
     *     }
     *
     * @apiError Unable to delete
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 400
     *     {
     *        "status":"Failed",
     *       "message": "Unable to delete"
     *     }
     */
    public function destroy($id)
    {
        $delete = $this->departmentRepository->delete($id);
        if($delete)
            return response()
            ->json(['status'=>'Success','message' => 'Deleted successfully'], 200);
        else
            return response()
            ->json(['status'=>'Failed','message' => 'Unable to delete'], 400);
    }
}
