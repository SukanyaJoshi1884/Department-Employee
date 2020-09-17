<?php

namespace App\Http\Controllers;
use App\Repositories\Employees\EmployeeInterface as EmployeeInterface;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $employeeRepository;

    public function __construct(EmployeeInterface $employeeRepository)
    {
       $this->employeeRepository = $employeeRepository;
    }

    /**
     * Function to display all the departments
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * @api {get} /employee List Employee data
     * @apiName employee
     * @apiGroup Employees
     *
     * @apiSuccess {Number} id ID of employee.
     * @apiSuccess {String} first_name  Name of employee.
     * @apiSuccess {String} last_name  Name of employee.
     * @apiSuccess {String} email  Name of employee.
     * @apiSuccess {Array} employee_contacts  Contacts of employee
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "status": "Success",
                "data": [
                    {
                        "id": 1,
                        "first_name": "sukanya",
                        "last_name": "joshi",
                        "email": "sdsf@dsfdf.com",
                        "dept_id": 1,
                        "created_at": "2020-09-17T10:55:40.000000Z",
                        "updated_at": "2020-09-17T10:55:40.000000Z",
                        "employees_contacts": [
                            {
                                "id": 1,
                                "emp_id": 1,
                                "address": "sdfcdf",
                                "contact_number": "54684684654",
                                "created_at": null,
                                "updated_at": null
                            },
                            {
                                "id": 2,
                                "emp_id": 1,
                                "address": "dfdfvdfv",
                                "contact_number": "4645454654",
                                "created_at": null,
                                "updated_at": null
                            }
                        ],
                        "department": {
                            "id": 1,
                            "name": "mechanical",
                            "created_at": "2020-09-16T17:17:32.000000Z",
                            "updated_at": "2020-09-17T13:45:28.000000Z"
                        }
                    },
                    {
                        "id": 2,
                        "first_name": "sukanya",
                        "last_name": "joshi",
                        "email": "sdsf@dsfdf.com",
                        "dept_id": 1,
                        "created_at": "2020-09-17T10:56:02.000000Z",
                        "updated_at": "2020-09-17T10:56:02.000000Z",
                        "employees_contacts": [
                            {
                                "id": 3,
                                "emp_id": 2,
                                "address": "sdfcdf",
                                "contact_number": "54684684654",
                                "created_at": null,
                                "updated_at": null
                            },
                            {
                                "id": 4,
                                "emp_id": 2,
                                "address": "dfdfvdfv",
                                "contact_number": "4645454654",
                                "created_at": null,
                                "updated_at": null
                            }
                        ],
                        "department": {
                            "id": 1,
                            "name": "mechanical",
                            "created_at": "2020-09-16T17:17:32.000000Z",
                            "updated_at": "2020-09-17T13:45:28.000000Z"
                        }
                    },
                    {
                        "id": 3,
                        "first_name": "sukanya",
                        "last_name": "joshi",
                        "email": "sdsf@dsfdf.com",
                        "dept_id": 1,
                        "created_at": "2020-09-17T10:56:42.000000Z",
                        "updated_at": "2020-09-17T10:56:42.000000Z",
                        "employees_contacts": [
                            {
                                "id": 5,
                                "emp_id": 3,
                                "address": "sdfcdf",
                                "contact_number": "54684684654",
                                "created_at": null,
                                "updated_at": null
                            },
                            {
                                "id": 6,
                                "emp_id": 3,
                                "address": "dfdfvdfv",
                                "contact_number": "4645454654",
                                "created_at": null,
                                "updated_at": null
                            }
                        ],
                        "department": {
                            "id": 1,
                            "name": "mechanical",
                            "created_at": "2020-09-16T17:17:32.000000Z",
                            "updated_at": "2020-09-17T13:45:28.000000Z"
                        }
                    }
                    
                ]
            }

     
     */
    public function index()
    {
        $employees = $this->employeeRepository->allWith(['employees_contacts','department']);
        if(count($employees)>0)
        {
            return response()
            ->json(['status'=>'Success','data' => $employees], 200); 
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
     * @api {post} /employee Create new employee data
     * @apiName create-employee
     * @apiGroup Employees
     * @apiParam {String} first_name Name of employee
     * @apiParam {String} last_name Name of employee
     * @apiParam {String} email Name of employee
     * @apiParam {Number} dept_id Name of employee
     * @apiParam {Array} address Name of employee
     * @apiParam {Array} contact_number Name of employee
      * @apiSuccess {String} first_name first name of employee
     * @apiSuccess {String} last_name last name of employee
     * @apiSuccess {String} email email of employee
     * @apiSuccess {Number} dept_id dept of employee
     * @apiSuccess {Array} address address of employee
     * @apiSuccess {Array} contact_number contact number of employee
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "status": "Success",
                "result": {
                    "id": 7,
                    "first_name": "sukanya",
                    "last_name": "joshi",
                    "email": "sdsf@dsfdf.com",
                    "dept_id": 1,
                    "created_at": "2020-09-17T14:11:26.000000Z",
                    "updated_at": "2020-09-17T14:11:26.000000Z",
                    "employees_contacts": [
                        {
                            "id": 13,
                            "emp_id": 7,
                            "address": "sdfcdf",
                            "contact_number": "54684684654",
                            "created_at": null,
                            "updated_at": null
                        },
                        {
                            "id": 14,
                            "emp_id": 7,
                            "address": "dfdfvdfv",
                            "contact_number": "4645454654",
                            "created_at": null,
                            "updated_at": null
                        }
                    ]
                },
                "message": "Employee created"
        }
     * @apiErrorExample Error-Response:
     *  HTTP/1.1 422 Unprocessable Entity
        {
            "first_name": [
                "The first name field is required."
            ],
            "last_name": [
                "The last name field is required."
            ]
        }
     *
     *
     */

    public function create(Request $request)
    {
        //validate form fields
        $this->validate($request, [
            'dept_id'=>'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|email',
            'contact_number'=>'required',
            'address'=>'required'
        ]);

        $data = $request->all();

        $create = $this->employeeRepository->save($data);
        if($create)
        {
            $getEmployee = $this->employeeRepository->get($create->id);
            foreach($request->address as $key=>$add)
            {
                foreach($request->contact_number as $k=>$con)
                {
                    $contact_data[$key]['address'] = $add;
                    $contact_data[$k]['contact_number'] = $con;
                }
                $contact_data[$key]['emp_id'] = $create->id;
            }
            if($contact_data)
            {
                //insert contacts data for this employee
                $getEmployee = $getEmployee->employees_contacts()->insert($contact_data);
            }
            if($getEmployee){
                $data = $this->employeeRepository->getData($create->id,'employees_contacts');
                return response()
                    ->json(['status'=>'Success','result' => $data, 'message'=>'Employee created'], 200);
            }
            else
                return response()
                    ->json(['status'=>'Failed', 'message'=>'Unable to create employee'], 400);
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @api {get} /employee/{id} Show employee data
     * @apiName show-employee
     * @apiGroup Employees
     * @apiParam {Number} id ID of employee
     * @apiSuccess {String} first_name first name of employee
     * @apiSuccess {String} last_name last name of employee
     * @apiSuccess {String} email email of employee
     * @apiSuccess {Number} dept_id dept of employee
     * @apiSuccess {Array} address address of employee
     * @apiSuccess {Array} contact_number contact number of employee
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
            {
                "result": {
                    "id": 4,
                    "first_name": "sukanya",
                    "last_name": "joshi",
                    "email": "sdsf@dsfdf.com",
                    "dept_id": 1,
                    "created_at": "2020-09-17T10:57:17.000000Z",
                    "updated_at": "2020-09-17T10:57:17.000000Z",
                    "department": {
                        "id": 1,
                        "name": "Computer",
                        "created_at": "2020-09-16T17:17:32.000000Z",
                        "updated_at": "2020-09-16T17:17:32.000000Z"
                    },
                    "employees_contacts": [
                        {
                            "id": 7,
                            "emp_id": 4,
                            "address": "sdfcdf",
                            "contact_number": "54684684654",
                            "created_at": null,
                            "updated_at": null
                        },
                        {
                            "id": 8,
                            "emp_id": 4,
                            "address": "dfdfvdfv",
                            "contact_number": "4645454654",
                            "created_at": null,
                            "updated_at": null
                        }
                    ]
                }
            }
     *
     * @apiError Not found The id of the employee was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
             "status":"Failed",
     *       "message": "No data found"
     *     }
     */
    public function show($id)
    {

        $showEmployee = $this->employeeRepository->getData($id,['department','employees_contacts']);
        if($showEmployee)
            return response()
            ->json(['status'=>'Success','result' => $showEmployee], 200);
        else
            return response()
            ->json(['status'=>'Failed','message' => 'No data found'], 404); 
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @api {delete} /employee/{id} Delete employee
     * @apiName delete-employee
     * @apiGroup Employees
     * @apiSuccessExample Success-Response:
        HTTP/1.1 200 Success
     *     {
     *        "status":"Success",
     *       "message": "Deleted successfully"
     *     }
     *
     * @apiError Unable to delete
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 400
     *     {
     *        "status":  "Failed",
     *       "message": "Unable to delete"
     *     }
     */
    public function destroy($id)
    {
        $delete = $this->employeeRepository->delete($id);
        if($delete)
            return response()
            ->json(['status'=>'Success','message' => 'Deleted successfully'], 200);
        else
            return response()
            ->json(['status'=>'Failed','message' => 'Unable to delete'], 400);
    }
}
