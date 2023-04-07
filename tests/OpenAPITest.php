<?php
/*
 * PSX is a open source PHP framework to develop RESTful APIs.
 * For the current version and informations visit <http://phpsx.org>
 *
 * Copyright 2010-2023 Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace PSX\OpenAPI\Tests;

use PHPUnit\Framework\TestCase;
use PSX\OpenAPI\Components;
use PSX\OpenAPI\Contact;
use PSX\OpenAPI\Header;
use PSX\OpenAPI\Headers;
use PSX\OpenAPI\Info;
use PSX\OpenAPI\License;
use PSX\OpenAPI\MediaType;
use PSX\OpenAPI\MediaTypes;
use PSX\OpenAPI\OAuthFlow;
use PSX\OpenAPI\OAuthFlows;
use PSX\OpenAPI\OpenAPI;
use PSX\OpenAPI\Operation;
use PSX\OpenAPI\Parameter;
use PSX\OpenAPI\PathItem;
use PSX\OpenAPI\Paths;
use PSX\OpenAPI\Response;
use PSX\OpenAPI\Responses;
use PSX\OpenAPI\Schemas;
use PSX\OpenAPI\Scopes;
use PSX\OpenAPI\SecurityRequirement;
use PSX\OpenAPI\SecurityScheme;
use PSX\OpenAPI\SecuritySchemes;
use PSX\OpenAPI\Server;
use PSX\OpenAPI\Tag;
use PSX\Record\Record;
use Symfony\Component\Yaml\Yaml;

/**
 * OpenAPITest
 *
 * @author  Christoph Kappestein <christoph.kappestein@gmail.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @link    http://phpsx.org
 */
class OpenAPITest extends TestCase
{
    public function testModel()
    {
        $license = new License();
        $license->setName('MIT');
        $license->setUrl('https://opensource.org/licenses/MIT');

        $contact = new Contact();
        $contact->setName('Foo Bar');
        $contact->setEmail('foo@bar.com');
        $contact->setUrl('http://foo.com');
        
        $info = new Info();
        $info->setVersion('1.0.0');
        $info->setTitle('Swagger Petstore');
        $info->setContact($contact);
        $info->setLicense($license);

        $paths = new Paths();

        // /pets
        $parameter = new Parameter();
        $parameter->setName('limit');
        $parameter->setIn('query');
        $parameter->setDescription('How many items to return at one time (max 100)');
        $parameter->setRequired(false);
        $parameter->setSchema(Record::fromArray(['type' => 'integer', 'format' => 'int32']));

        $header = new Header();
        $header->setDescription('A link to the next page of responses');
        $header->setSchema(Record::fromArray(['type' => 'string']));

        $headers = new Headers();
        $headers->put('x-next', $header);

        $mediaType = new MediaType();
        $mediaType->setSchema(Record::fromArray(['$ref' => '#/components/schemas/Pets']));

        $content = new MediaTypes();
        $content->put('application/json', $mediaType);

        $response = new Response();
        $response->setDescription('An paged array of pets');
        $response->setHeaders($headers);
        $response->setContent($content);

        $responses = new Responses();
        $responses->put('200', $response);

        $mediaType = new MediaType();
        $mediaType->setSchema(Record::fromArray(['$ref' => '#/components/schemas/Error']));

        $content = new MediaTypes();
        $content->put('application/json', $mediaType);

        $errorResponse = new Response();
        $errorResponse->setDescription('unexpected error');
        $errorResponse->setContent($content);

        $responses->put('default', $errorResponse);

        $operation = new Operation();
        $operation->setSummary('List all pets');
        $operation->setOperationId('listPets');
        $operation->setTags(['pets']);
        $operation->setParameters([$parameter]);
        $operation->setResponses($responses);

        $pathItem = new PathItem();
        $pathItem->setGet($operation);

        $response = new Response();
        $response->setDescription('Null response');

        $responses = new Responses();
        $responses->put('201', $response);
        $responses->put('default', $errorResponse);

        $operation = new Operation();
        $operation->setSummary('Create a pet');
        $operation->setOperationId('createPets');
        $operation->setTags(['pets']);
        $operation->setResponses($responses);

        $pathItem->setPost($operation);

        $paths->put('/pets', $pathItem);

        // /pets/{petId}
        $parameter = new Parameter();
        $parameter->setName('petId');
        $parameter->setIn('path');
        $parameter->setDescription('The id of the pet to retrieve');
        $parameter->setRequired(true);
        $parameter->setSchema(Record::fromArray(['type' => 'string']));

        $mediaType = new MediaType();
        $mediaType->setSchema(Record::fromArray(['$ref' => '#/components/schemas/Pets']));

        $mediaTypes = new MediaTypes();
        $mediaTypes->put('application/json', $mediaType);

        $response = new Response();
        $response->setDescription('Expected response to a valid request');
        $response->setContent($mediaTypes);

        $responses = new Responses();
        $responses->put('200', $response);
        $responses->put('default', $errorResponse);

        $operation = new Operation();
        $operation->setSummary('Info for a specific pet');
        $operation->setOperationId('showPetById');
        $operation->setTags(['pets']);
        $operation->setParameters([$parameter]);
        $operation->setResponses($responses);

        $pathItem = new PathItem();
        $pathItem->setGet($operation);

        $paths['/pets/{petId}'] = $pathItem;

        $server = new Server();
        $server->setUrl('http://petstore.swagger.io/v1');

        // schema
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

        $schemas->put('Error', [
            'required' => ['code', 'message'],
            'properties' => [
                'code' => ['type' => 'integer', 'format' => 'int32'],
                'message' => ['type' => 'string'],
            ]
        ]);

        $components = new Components();
        $components->setSchemas($schemas);

        $tags = [];

        $tag = new Tag();
        $tag->setName('pets');
        $tag->setDescription('Pets operations');
        $tags[] = $tag;

        $tag = new Tag();
        $tag->setName('bar');
        $tag->setDescription('Boo tag');
        $tags[] = $tag;

        $openAPI = new OpenAPI();
        $openAPI->setInfo($info);
        $openAPI->setPaths($paths);
        $openAPI->setServers([$server]);
        $openAPI->setComponents($components);
        $openAPI->setTags($tags);

        $actual = json_encode($openAPI, JSON_PRETTY_PRINT);
        $expect = file_get_contents(__DIR__ . '/resources/openapi.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual, $actual);

        // assert with yaml
        $expect = json_encode(Yaml::parse(file_get_contents(__DIR__ . '/resources/petstore.yaml')));

        $this->assertJsonStringEqualsJsonString($expect, $actual, $actual);
    }

    public function testModelSimple()
    {
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

        $actual = json_encode($openAPI, JSON_PRETTY_PRINT);
        $expect = file_get_contents(__DIR__ . '/resources/openapi_simple.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual, $actual);
    }

    public function testSecurity()
    {
        $scopes = new Scopes();
        $scopes['foo'] = 'Foo scope';
        $scopes['bar'] = 'Bar scope';

        $flow = new OAuthFlow();
        $flow->setAuthorizationUrl('http://api.phpsx.org/authorization');
        $flow->setTokenUrl('http://api.phpsx.org/token');
        $flow->setRefreshUrl('http://api.phpsx.org/token/refresh');
        $flow->setScopes($scopes);

        $flows = new OAuthFlows();
        $flows->setAuthorizationCode($flow);

        $scheme = new SecurityScheme();
        $scheme->setType('oauth2');
        $scheme->setFlows($flows);

        $paths = new Paths();

        $securityReq = new SecurityRequirement();
        $securityReq['oauth'] = ['foo', 'bar'];

        $operation = new Operation();
        $operation->setSummary('Info for a specific pet');
        $operation->setSecurity([$securityReq]);

        $pathItem = new PathItem();
        $pathItem->setGet($operation);

        $paths['/pets/{petId}'] = $pathItem;

        $schemes = new SecuritySchemes();
        $schemes['oauth'] = $scheme;

        $components = new Components();
        $components->setSecuritySchemes($schemes);

        $openAPI = new OpenAPI();
        $openAPI->setPaths($paths);
        $openAPI->setComponents($components);

        $actual = json_encode($openAPI, JSON_PRETTY_PRINT);
        $expect = file_get_contents(__DIR__ . '/resources/openapi_security.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual, $actual);
    }
}
