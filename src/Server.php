<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Required;

#[Description('An object representing a Server.')]
class Server implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $url = null;
    protected ?string $description = null;
    protected ?ServerVariables $variables = null;
    public function setUrl(?string $url) : void
    {
        $this->url = $url;
    }
    public function getUrl() : ?string
    {
        return $this->url;
    }
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setVariables(?ServerVariables $variables) : void
    {
        $this->variables = $variables;
    }
    public function getVariables() : ?ServerVariables
    {
        return $this->variables;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('url', $this->url);
        $record->put('description', $this->description);
        $record->put('variables', $this->variables);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

