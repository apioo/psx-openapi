<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Key;

#[Description('Describes the operations available on a single path. A Path Item MAY be empty, due to ACL constraints. The path itself is still exposed to the documentation viewer but they will not know which operations and parameters are available.')]
class PathItem implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Key('$ref')]
    protected ?string $ref = null;
    protected ?string $summary = null;
    protected ?string $description = null;
    protected ?Operation $get = null;
    protected ?Operation $put = null;
    protected ?Operation $post = null;
    protected ?Operation $delete = null;
    protected ?Operation $options = null;
    protected ?Operation $head = null;
    protected ?Operation $patch = null;
    protected ?Operation $trace = null;
    /**
     * @var array<Server>|null
     */
    protected ?array $servers = null;
    /**
     * @var array<Parameter>|null
     */
    protected ?array $parameters = null;
    public function setRef(?string $ref) : void
    {
        $this->ref = $ref;
    }
    public function getRef() : ?string
    {
        return $this->ref;
    }
    public function setSummary(?string $summary) : void
    {
        $this->summary = $summary;
    }
    public function getSummary() : ?string
    {
        return $this->summary;
    }
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setGet(?Operation $get) : void
    {
        $this->get = $get;
    }
    public function getGet() : ?Operation
    {
        return $this->get;
    }
    public function setPut(?Operation $put) : void
    {
        $this->put = $put;
    }
    public function getPut() : ?Operation
    {
        return $this->put;
    }
    public function setPost(?Operation $post) : void
    {
        $this->post = $post;
    }
    public function getPost() : ?Operation
    {
        return $this->post;
    }
    public function setDelete(?Operation $delete) : void
    {
        $this->delete = $delete;
    }
    public function getDelete() : ?Operation
    {
        return $this->delete;
    }
    public function setOptions(?Operation $options) : void
    {
        $this->options = $options;
    }
    public function getOptions() : ?Operation
    {
        return $this->options;
    }
    public function setHead(?Operation $head) : void
    {
        $this->head = $head;
    }
    public function getHead() : ?Operation
    {
        return $this->head;
    }
    public function setPatch(?Operation $patch) : void
    {
        $this->patch = $patch;
    }
    public function getPatch() : ?Operation
    {
        return $this->patch;
    }
    public function setTrace(?Operation $trace) : void
    {
        $this->trace = $trace;
    }
    public function getTrace() : ?Operation
    {
        return $this->trace;
    }
    /**
     * @param array<Server>|null $servers
     */
    public function setServers(?array $servers) : void
    {
        $this->servers = $servers;
    }
    public function getServers() : ?array
    {
        return $this->servers;
    }
    /**
     * @param array<Parameter>|null $parameters
     */
    public function setParameters(?array $parameters) : void
    {
        $this->parameters = $parameters;
    }
    public function getParameters() : ?array
    {
        return $this->parameters;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('$ref', $this->ref);
        $record->put('summary', $this->summary);
        $record->put('description', $this->description);
        $record->put('get', $this->get);
        $record->put('put', $this->put);
        $record->put('post', $this->post);
        $record->put('delete', $this->delete);
        $record->put('options', $this->options);
        $record->put('head', $this->head);
        $record->put('patch', $this->patch);
        $record->put('trace', $this->trace);
        $record->put('servers', $this->servers);
        $record->put('parameters', $this->parameters);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

