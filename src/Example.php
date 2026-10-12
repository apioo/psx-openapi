<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;

#[Description('An object grouping an internal or external example value with basic `summary` and `description` metadata. This object is typically used in fields named `examples` (plural), and is a referenceable alternative to older `example` (singular) fields that do not support referencing or metadata.  Examples allow demonstration of the usage of properties, parameters and objects within OpenAPI.')]
class Example implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $summary = null;
    protected ?string $description = null;
    protected mixed $value = null;
    protected ?string $externalValue = null;
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }
    public function getSummary(): ?string
    {
        return $this->summary;
    }
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setValue(mixed $value): void
    {
        $this->value = $value;
    }
    public function getValue(): mixed
    {
        return $this->value;
    }
    public function setExternalValue(?string $externalValue): void
    {
        $this->externalValue = $externalValue;
    }
    public function getExternalValue(): ?string
    {
        return $this->externalValue;
    }
    /**
     * @return \PSX\Record\RecordInterface<mixed>
     */
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('summary', $this->summary);
        $record->put('description', $this->description);
        $record->put('value', $this->value);
        $record->put('externalValue', $this->externalValue);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

