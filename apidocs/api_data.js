define({ "api": [
  {
    "type": "get",
    "url": "/pipes/:id",
    "title": "Read the pipe content",
    "name": "ReadPipe",
    "group": "Pipes",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "id",
            "description": "<p>Pipe unique ID.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "JSON",
            "description": "<p>content</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"pipe\": 123\n  \"value\": \"Test message\",\n  \"server\": \"iot3.test.com\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/PipesController.php",
    "groupTitle": "Pipes"
  },
  {
    "type": "post",
    "url": "/pipes/:id",
    "title": "Write the pipe content",
    "name": "WritePipe",
    "group": "Pipes",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "id",
            "description": "<p>Pipe unique ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "value",
            "description": "<p>Pipe content to write</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "JSON",
            "description": "<p>content</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"pipe\": 123\n  \"value\": \"Test message\",\n  \"server\": \"iot3.test.com\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/PipesController.php",
    "groupTitle": "Pipes"
  }
] });