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
     * @api {post} /department Create new department data
     * @apiName create-department
     * @apiGroup Departments
     * @apiParam {String} name Name of department
     * @apiSuccess {Number} id ID of department.
     * @apiSuccess {String} name  Name of department.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     "data": [
     *         {
     *          "id": 1,
     *          "name": "Computer",
     *          "created_at": "2020-09-16T17:17:32.000000Z",
     *          "updated_at": "2020-09-16T17:17:32.000000Z"
     *          }
     *      ]
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
     * @api {get} /department/{id} Show department data
     * @apiName show-department
     * @apiGroup Departments
     * @apiParam {Number} id ID of department
     * @apiSuccess {Number} id ID of department.
     * @apiSuccess {String} name  Name of department.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     "data": [
     *         {
     *          "id": 1,
     *          "name": "Computer",
     *          "created_at": "2020-09-16T17:17:32.000000Z",
     *          "updated_at": "2020-09-16T17:17:32.000000Z"
     *          }
     *      ]
     *
     * @apiError Not found The id of the department was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "message": "No data found"
     *     }
     */
    public function show($id)
    {

        $showDepartment = $this->employeeRepository->get($id);
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
     *     "data": [
     *         {
     *          "id": 1,
     *          "name": "Computer",
     *          "created_at": "2020-09-16T17:17:32.000000Z",
     *          "updated_at": "2020-09-16T17:17:32.000000Z"
     *          }
     *      ]
     *
     */
    public function update(Request $request, $id)
    {
        //validate form fields
        $this->validate($request, [
            'name' => 'required',
        ]);
        $data = $request->all();
        $updateDepartment = $this->employeeRepository->update($id,$data);
        if($updateDepartment){
            $newData = $this->employeeRepository->get($id);
            return response()
            ->json(['result' => $newData], 200);
        }
            
        else
            return response()
            ->json(['message' => 'Unable to update data'], 400);

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
