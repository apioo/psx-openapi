<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Required;

#[Description('An object representing a Server Variable for server URL template substitution.')]
class ServerVariable implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    /**
     * @var array<string>|null
     */
    protected ?array $enum = null;
    protected ?string $default = null;
    protected ?string $description = null;
    /**
     * @param array<string>|null $enum
     */
    public function setEnum(?array $enum) : void
    {
        $this->enum = $enum;
    }
    public function getEnum() : ?array
    {
        return $this->enum;
    }
    public function setDefault(?string $default) : void
    {
        $this->default = $default;
    }
    public function getDefault() : ?string
    {
        return $this->default;
    }
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('enum', $this->enum);
        $record->put('default', $this->default);
        $record->put('description', $this->description);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

