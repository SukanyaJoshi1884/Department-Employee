define({ "api": [
  {
    "type": "post",
    "url": "/department",
    "title": "Create new department data",
    "name": "create-department",
    "group": "Departments",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of department</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID of department.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of department.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\"data\": [\n    {\n     \"id\": 1,\n     \"name\": \"Computer\",\n     \"created_at\": \"2020-09-16T17:17:32.000000Z\",\n     \"updated_at\": \"2020-09-16T17:17:32.000000Z\"\n     }\n ]",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/DepartmentController.php",
    "groupTitle": "Departments"
  },
  {
    "type": "delete",
    "url": "/department/{id}",
    "title": "Delete department",
    "name": "delete-department",
    "group": "Departments",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 Success\n{\n  \"message\": \"Deleted successfully\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "Unable",
            "description": "<p>to delete</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400\n{\n  \"message\": \"Unable to delete\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/DepartmentController.php",
    "groupTitle": "Departments"
  },
  {
    "type": "get",
    "url": "/department",
    "title": "List department data",
    "name": "department",
    "group": "Departments",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID of department.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of department.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\"data\": [\n    {\n     \"id\": 1,\n     \"name\": \"Computer\",\n     \"created_at\": \"2020-09-16T17:17:32.000000Z\",\n     \"updated_at\": \"2020-09-16T17:17:32.000000Z\"\n     }\n ]",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/DepartmentController.php",
    "groupTitle": "Departments"
  },
  {
    "type": "get",
    "url": "/department/{id}",
    "title": "Show department data",
    "name": "show-department",
    "group": "Departments",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID of department</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID of department.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of department.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\"data\": [\n    {\n     \"id\": 1,\n     \"name\": \"Computer\",\n     \"created_at\": \"2020-09-16T17:17:32.000000Z\",\n     \"updated_at\": \"2020-09-16T17:17:32.000000Z\"\n     }\n ]",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "Not",
            "description": "<p>found The id of the department was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"message\": \"No data found\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/DepartmentController.php",
    "groupTitle": "Departments"
  },
  {
    "type": "post",
    "url": "/department/{id}",
    "title": "Update department data",
    "name": "update-department",
    "group": "Departments",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of department</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID of department.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of department.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\"data\": [\n    {\n     \"id\": 1,\n     \"name\": \"Computer\",\n     \"created_at\": \"2020-09-16T17:17:32.000000Z\",\n     \"updated_at\": \"2020-09-16T17:17:32.000000Z\"\n     }\n ]",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/DepartmentController.php",
    "groupTitle": "Departments"
  },
  {
    "type": "post",
    "url": "/employee",
    "title": "Create new employee data",
    "name": "create-employee",
    "group": "Employees",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "first_name",
            "description": "<p>Name of employee</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "last_name",
            "description": "<p>Name of employee</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Name of employee</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "dept_id",
            "description": "<p>Name of employee</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "address",
            "description": "<p>Name of employee</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "contact_number",
            "description": "<p>Name of employee</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "first_name",
            "description": "<p>first name of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "last_name",
            "description": "<p>last name of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>email of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "dept_id",
            "description": "<p>dept of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "address",
            "description": "<p>address of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "contact_number",
            "description": "<p>contact number of employee</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\"result\": {\n            \"id\": 6,\n            \"first_name\": \"sukanya\",\n            \"last_name\": \"joshi\",\n            \"email\": \"sdsf@dsfdf.com\",\n            \"dept_id\": 1,\n            \"created_at\": \"2020-09-17T13:14:16.000000Z\",\n            \"updated_at\": \"2020-09-17T13:14:16.000000Z\",\n            \"employees_contacts\": [\n                {\n                    \"id\": 11,\n                    \"emp_id\": 6,\n                    \"address\": \"sdfcdf\",\n                    \"contact_number\": \"54684684654\",\n                    \"created_at\": null,\n                    \"updated_at\": null\n                },\n                {\n                    \"id\": 12,\n                    \"emp_id\": 6,\n                    \"address\": \"dfdfvdfv\",\n                    \"contact_number\": \"4645454654\",\n                    \"created_at\": null,\n                    \"updated_at\": null\n                }\n            ]\n        },\n        \"message\": \"Employee created\"",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/EmployeeController.php",
    "groupTitle": "Employees"
  },
  {
    "type": "delete",
    "url": "/employee/{id}",
    "title": "Delete employee",
    "name": "delete-employee",
    "group": "Employees",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    HTTP/1.1 200 Success\n{\n  \"message\": \"Deleted successfully\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "Unable",
            "description": "<p>to delete</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400\n{\n  \"message\": \"Unable to delete\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/EmployeeController.php",
    "groupTitle": "Employees"
  },
  {
    "type": "get",
    "url": "/employee",
    "title": "List Employee data",
    "name": "employee",
    "group": "Employees",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID of employee.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "first_name",
            "description": "<p>Name of employee.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "last_name",
            "description": "<p>Name of employee.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Name of employee.</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "employee_contacts",
            "description": "<p>Contacts of employee</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n\"data\": [\n    \"result\": {\n            \"id\": 5,\n            \"first_name\": \"sukanya\",\n            \"last_name\": \"joshi\",\n            \"email\": \"sdsf@dsfdf.com\",\n            \"dept_id\": 1,\n            \"created_at\": \"2020-09-17T10:57:35.000000Z\",\n            \"updated_at\": \"2020-09-17T10:57:35.000000Z\",\n            \"employees_contacts\": [\n                {\n                    \"id\": 9,\n                    \"emp_id\": 5,\n                    \"address\": \"sdfcdf\",\n                    \"contact_number\": \"54684684654\",\n                    \"created_at\": null,\n                    \"updated_at\": null\n                },\n                {\n                    \"id\": 10,\n                    \"emp_id\": 5,\n                    \"address\": \"dfdfvdfv\",\n                    \"contact_number\": \"4645454654\",\n                    \"created_at\": null,\n                    \"updated_at\": null\n                }\n            ]\n        },\n        {\n            ...\n        }\n ]",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/EmployeeController.php",
    "groupTitle": "Employees"
  },
  {
    "type": "get",
    "url": "/employee/{id}",
    "title": "Show employee data",
    "name": "show-employee",
    "group": "Employees",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID of employee</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "first_name",
            "description": "<p>first name of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "last_name",
            "description": "<p>last name of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>email of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "dept_id",
            "description": "<p>dept of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "address",
            "description": "<p>address of employee</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "contact_number",
            "description": "<p>contact number of employee</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n        \"result\": {\n            \"id\": 4,\n            \"first_name\": \"sukanya\",\n            \"last_name\": \"joshi\",\n            \"email\": \"sdsf@dsfdf.com\",\n            \"dept_id\": 1,\n            \"created_at\": \"2020-09-17T10:57:17.000000Z\",\n            \"updated_at\": \"2020-09-17T10:57:17.000000Z\",\n            \"department\": {\n                \"id\": 1,\n                \"name\": \"Computer\",\n                \"created_at\": \"2020-09-16T17:17:32.000000Z\",\n                \"updated_at\": \"2020-09-16T17:17:32.000000Z\"\n            },\n            \"employees_contacts\": [\n                {\n                    \"id\": 7,\n                    \"emp_id\": 4,\n                    \"address\": \"sdfcdf\",\n                    \"contact_number\": \"54684684654\",\n                    \"created_at\": null,\n                    \"updated_at\": null\n                },\n                {\n                    \"id\": 8,\n                    \"emp_id\": 4,\n                    \"address\": \"dfdfvdfv\",\n                    \"contact_number\": \"4645454654\",\n                    \"created_at\": null,\n                    \"updated_at\": null\n                }\n            ]\n        }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "Not",
            "description": "<p>found The id of the employee was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"message\": \"No data found\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/EmployeeController.php",
    "groupTitle": "Employees"
  }
] });
