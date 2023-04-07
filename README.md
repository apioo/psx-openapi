
# OpenAPI

## About

This library contains model classes to generate an OpenAPI specification in a type-safe way. The models are
automatically generated based on the [TypeSchema](https://typeschema.org/) specification (s. `typeschema.json`). The
following example shows how you can generate an OpenAPI spec:

```php
$info = new Info();
$info->setVersion('1.0.0');
$info->setTitle('Swagger Petstore');

$parameter = new Parameter();
$parameter->setName('limit');
$parameter->setIn('query');
$parameter->setDescription('How many items to return at one time (max 100)');
$parameter->setRequired(false);
$parameter->setSchema(Record::fromArray(['type' => 'integer', 'format' => 'int32']));

$mediaType = new MediaType();
$mediaType->setSchema(Record::fromArray(['$ref' => '#/components/schemas/Pets']));

$content = new MediaTypes();
$content->put('application/json', $mediaType);

$response = new Response();
$response->setDescription('An paged array of pets');
$response->setContent($content);

$responses = new Responses();
$responses->put('200', $response);

$operation = new Operation();
$operation->setSummary('List all pets');
$operation->setOperationId('listPets');
$operation->setTags(['pets']);
$operation->setParameters([$parameter]);
$operation->setResponses($responses);

$pathItem = new PathItem();
$pathItem->setGet($operation);

$paths = new Paths();
$paths->put('/pets', $pathItem);

$schemas = new Schemas();
$schemas->put('Pet', [
    'required' => ['id', 'name'],
    'properties' => [
        'id' => ['type' => 'integer', 'format' => 'int64'],
        'name' => ['type' => 'string'],
        'tag' => ['type' => 'string'],
    ]
]);

$schemas->put('Pets', [
    'type' => 'array',
    'items' => ['$ref' => '#/components/schemas/Pet'],
]);

$components = new Components();
$components->setSchemas($schemas);

$openAPI = new OpenAPI();
$openAPI->setInfo($info);
$openAPI->setPaths($paths);
$openAPI->setComponents($components);

echo json_encode($openAPI, JSON_PRETTY_PRINT);

```

This would result in the following JSON:

```json
{
  "openapi": "3.0.3",
  "info": {
    "title": "Swagger Petstore",
    "version": "1.0.0"
  },
  "paths": {
    "\/pets": {
      "get": {
        "tags": [
          "pets"
        ],
        "summary": "List all pets",
        "operationId": "listPets",
        "parameters": [
          {
            "name": "limit",
            "in": "query",
            "description": "How many items to return at one time (max 100)",
            "required": false,
            "schema": {
              "type": "integer",
              "format": "int32"
            }
          }
        ],
        "responses": {
          "200": {
            "description": "An paged array of pets",
            "content": {
              "application\/json": {
                "schema": {
                  "$ref": "#\/components\/schemas\/Pets"
                }
              }
            }
          }
        }
      }
    }
  },
  "components": {
    "schemas": {
      "Pet": {
        "required": [
          "id",
          "name"
        ],
        "properties": {
          "id": {
            "type": "integer",
            "format": "int64"
          },
          "name": {
            "type": "string"
          },
          "tag": {
            "type": "string"
          }
        }
      },
      "Pets": {
        "type": "array",
        "items": {
          "$ref": "#\/components\/schemas\/Pet"
        }
      }
    }
  }
}
```

## Contribution

If you want to suggest changes please only change the `typeschema.json` specification and then run
the `php gen.php` script to regenerate all model classes.
