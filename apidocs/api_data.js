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
          "content": "HTTP/1.1 200 OK\n{\n  \"message\": \"Test message\",\n  \"timestamp\": \"2015-07-20T19:00:00Z\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/PipesController.php",
    "groupTitle": "Pipes"
  }
] });