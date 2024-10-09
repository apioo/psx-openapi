<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Key;
use PSX\Schema\Attribute\Required;

#[Description('A simple object to allow referencing other components in the specification, internally and externally.  The Reference Object is defined by JSON Reference and follows the same structure, behavior and rules.   For this specification, reference resolution is accomplished as defined by the JSON Reference specification and not by the JSON Schema specification.')]
class Reference implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Key('$ref')]
    protected ?string $ref = null;
    public function setRef(?string $ref) : void
    {
        $this->ref = $ref;
    }
    public function getRef() : ?string
    {
        return $this->ref;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('$ref', $this->ref);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

