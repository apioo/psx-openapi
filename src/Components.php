<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;

#[Description('Holds a set of reusable objects for different aspects of the OAS. All objects defined within the components object will have no effect on the API unless they are explicitly referenced from properties outside the components object.')]
class Components implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?Schemas $schemas = null;
    protected ?Responses $responses = null;
    protected ?Parameters $parameters = null;
    protected ?Examples $examples = null;
    protected ?RequestBodies $requestBodies = null;
    protected ?Headers $headers = null;
    protected ?SecuritySchemes $securitySchemes = null;
    protected ?Links $links = null;
    protected ?Callbacks $callbacks = null;
    public function setSchemas(?Schemas $schemas) : void
    {
        $this->schemas = $schemas;
    }
    public function getSchemas() : ?Schemas
    {
        return $this->schemas;
    }
    public function setResponses(?Responses $responses) : void
    {
        $this->responses = $responses;
    }
    public function getResponses() : ?Responses
    {
        return $this->responses;
    }
    public function setParameters(?Parameters $parameters) : void
    {
        $this->parameters = $parameters;
    }
    public function getParameters() : ?Parameters
    {
        return $this->parameters;
    }
    public function setExamples(?Examples $examples) : void
    {
        $this->examples = $examples;
    }
    public function getExamples() : ?Examples
    {
        return $this->examples;
    }
    public function setRequestBodies(?RequestBodies $requestBodies) : void
    {
        $this->requestBodies = $requestBodies;
    }
    public function getRequestBodies() : ?RequestBodies
    {
        return $this->requestBodies;
    }
    public function setHeaders(?Headers $headers) : void
    {
        $this->headers = $headers;
    }
    public function getHeaders() : ?Headers
    {
        return $this->headers;
    }
    public function setSecuritySchemes(?SecuritySchemes $securitySchemes) : void
    {
        $this->securitySchemes = $securitySchemes;
    }
    public function getSecuritySchemes() : ?SecuritySchemes
    {
        return $this->securitySchemes;
    }
    public function setLinks(?Links $links) : void
    {
        $this->links = $links;
    }
    public function getLinks() : ?Links
    {
        return $this->links;
    }
    public function setCallbacks(?Callbacks $callbacks) : void
    {
        $this->callbacks = $callbacks;
    }
    public function getCallbacks() : ?Callbacks
    {
        return $this->callbacks;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('schemas', $this->schemas);
        $record->put('responses', $this->responses);
        $record->put('parameters', $this->parameters);
        $record->put('examples', $this->examples);
        $record->put('requestBodies', $this->requestBodies);
        $record->put('headers', $this->headers);
        $record->put('securitySchemes', $this->securitySchemes);
        $record->put('links', $this->links);
        $record->put('callbacks', $this->callbacks);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

