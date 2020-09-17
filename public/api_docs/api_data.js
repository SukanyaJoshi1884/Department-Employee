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
  }
] });
