<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Required;

#[Description('This is the root object of the OpenAPI document.')]
class OpenAPI implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $openapi = '3.0.3';
    protected ?Info $info = null;
    protected ?string $jsonSchemaDialect = null;
    /**
     * @var array<Server>|null
     */
    protected ?array $servers = null;
    protected ?Paths $paths = null;
    protected ?Webhooks $webhooks = null;
    protected ?Components $components = null;
    /**
     * @var array<SecurityRequirement>|null
     */
    protected ?array $security = null;
    /**
     * @var array<Tag>|null
     */
    protected ?array $tags = null;
    protected ?ExternalDocs $externalDocs = null;
    public function setOpenapi(?string $openapi) : void
    {
        $this->openapi = $openapi;
    }
    public function getOpenapi() : ?string
    {
        return $this->openapi;
    }
    public function setInfo(?Info $info) : void
    {
        $this->info = $info;
    }
    public function getInfo() : ?Info
    {
        return $this->info;
    }
    public function setJsonSchemaDialect(?string $jsonSchemaDialect) : void
    {
        $this->jsonSchemaDialect = $jsonSchemaDialect;
    }
    public function getJsonSchemaDialect() : ?string
    {
        return $this->jsonSchemaDialect;
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
    public function setPaths(?Paths $paths) : void
    {
        $this->paths = $paths;
    }
    public function getPaths() : ?Paths
    {
        return $this->paths;
    }
    public function setWebhooks(?Webhooks $webhooks) : void
    {
        $this->webhooks = $webhooks;
    }
    public function getWebhooks() : ?Webhooks
    {
        return $this->webhooks;
    }
    public function setComponents(?Components $components) : void
    {
        $this->components = $components;
    }
    public function getComponents() : ?Components
    {
        return $this->components;
    }
    /**
     * @param array<SecurityRequirement>|null $security
     */
    public function setSecurity(?array $security) : void
    {
        $this->security = $security;
    }
    public function getSecurity() : ?array
    {
        return $this->security;
    }
    /**
     * @param array<Tag>|null $tags
     */
    public function setTags(?array $tags) : void
    {
        $this->tags = $tags;
    }
    public function getTags() : ?array
    {
        return $this->tags;
    }
    public function setExternalDocs(?ExternalDocs $externalDocs) : void
    {
        $this->externalDocs = $externalDocs;
    }
    public function getExternalDocs() : ?ExternalDocs
    {
        return $this->externalDocs;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('openapi', $this->openapi);
        $record->put('info', $this->info);
        $record->put('jsonSchemaDialect', $this->jsonSchemaDialect);
        $record->put('servers', $this->servers);
        $record->put('paths', $this->paths);
        $record->put('webhooks', $this->webhooks);
        $record->put('components', $this->components);
        $record->put('security', $this->security);
        $record->put('tags', $this->tags);
        $record->put('externalDocs', $this->externalDocs);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

