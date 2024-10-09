<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Required;

#[Description('License information for the exposed API.')]
class License implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $name = null;
    protected ?string $identifier = null;
    protected ?string $url = null;
    public function setName(?string $name) : void
    {
        $this->name = $name;
    }
    public function getName() : ?string
    {
        return $this->name;
    }
    public function setIdentifier(?string $identifier) : void
    {
        $this->identifier = $identifier;
    }
    public function getIdentifier() : ?string
    {
        return $this->identifier;
    }
    public function setUrl(?string $url) : void
    {
        $this->url = $url;
    }
    public function getUrl() : ?string
    {
        return $this->url;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('name', $this->name);
        $record->put('identifier', $this->identifier);
        $record->put('url', $this->url);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

