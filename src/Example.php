<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;


class Example implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $summary = null;
    protected ?string $description = null;
    protected ?string $externalValue = null;
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
    public function setExternalValue(?string $externalValue) : void
    {
        $this->externalValue = $externalValue;
    }
    public function getExternalValue() : ?string
    {
        return $this->externalValue;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('summary', $this->summary);
        $record->put('description', $this->description);
        $record->put('externalValue', $this->externalValue);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

