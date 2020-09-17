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
     *     "data": [
     *         "result": {
                "id": 5,
                "first_name": "sukanya",
                "last_name": "joshi",
                "email": "sdsf@dsfdf.com",
                "dept_id": 1,
                "created_at": "2020-09-17T10:57:35.000000Z",
                "updated_at": "2020-09-17T10:57:35.000000Z",
                "employees_contacts": [
                    {
                        "id": 9,
                        "emp_id": 5,
                        "address": "sdfcdf",
                        "contact_number": "54684684654",
                        "created_at": null,
                        "updated_at": null
                    },
                    {
                        "id": 10,
                        "emp_id": 5,
                        "address": "dfdfvdfv",
                        "contact_number": "4645454654",
                        "created_at": null,
                        "updated_at": null
                    }
                ]
            },
            {
                ...
            }
     *      ]
     *
     */
    public function index()
    {
        $employees = $this->employeeRepository->allWith(['employees_contacts','department']);
        if(count($employees)>0)
        {
            return response()
            ->json(['data' => $employees], 200); 
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
     *     "result": {
                "id": 6,
                "first_name": "sukanya",
                "last_name": "joshi",
                "email": "sdsf@dsfdf.com",
                "dept_id": 1,
                "created_at": "2020-09-17T13:14:16.000000Z",
                "updated_at": "2020-09-17T13:14:16.000000Z",
                "employees_contacts": [
                    {
                        "id": 11,
                        "emp_id": 6,
                        "address": "sdfcdf",
                        "contact_number": "54684684654",
                        "created_at": null,
                        "updated_at": null
                    },
                    {
                        "id": 12,
                        "emp_id": 6,
                        "address": "dfdfvdfv",
                        "contact_number": "4645454654",
                        "created_at": null,
                        "updated_at": null
                    }
                ]
            },
            "message": "Employee created"
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
                    ->json(['result' => $data, 'message'=>'Employee created'], 200);
            }
            else
                return response()
                    ->json([ 'message'=>'Unable to create employee'], 400);
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
     *
     * @apiError Not found The id of the employee was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "message": "No data found"
     *     }
     */
    public function show($id)
    {

        $showEmployee = $this->employeeRepository->getData($id,['department','employees_contacts']);
        if($showEmployee)
            return response()
            ->json(['result' => $showEmployee], 200);
        else
            return response()
            ->json(['message' => 'No data found'], 404); 
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
     *       "message": "Deleted successfully"
     *     }
     *
     * @apiError Unable to delete
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 400
     *     {
     *       "message": "Unable to delete"
     *     }
     */
    public function destroy($id)
    {
        $delete = $this->employeeRepository->delete($id);
        if($delete)
            return response()
            ->json(['message' => 'Deleted successfully'], 200);
        else
            return response()
            ->json(['message' => 'Unable to delete'], 400);
    }
}
