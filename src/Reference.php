<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Key;

#[Description('A simple object to allow referencing other components in the OpenAPI Description, internally and externally.  The `$ref` string value contains a URI (RFC3986), which identifies the value being referenced.')]
class Reference implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Key('$ref')]
    protected ?string $ref = null;
    protected ?string $summary = null;
    protected ?string $description = null;
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }
    public function getRef(): ?string
    {
        return $this->ref;
    }
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
    /**
     * @return \PSX\Record\RecordInterface<mixed>
     */
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('$ref', $this->ref);
        $record->put('summary', $this->summary);
        $record->put('description', $this->description);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

