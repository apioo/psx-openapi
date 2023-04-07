<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;

#[Description('Each Media Type Object provides schema and examples for the media type identified by its key.')]
class MediaType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected mixed $schema = null;
    protected mixed $example = null;
    protected ?Examples $examples = null;
    protected ?Encodings $encoding = null;
    public function setSchema(mixed $schema) : void
    {
        $this->schema = $schema;
    }
    public function getSchema() : mixed
    {
        return $this->schema;
    }
    public function setExample(mixed $example) : void
    {
        $this->example = $example;
    }
    public function getExample() : mixed
    {
        return $this->example;
    }
    public function setExamples(?Examples $examples) : void
    {
        $this->examples = $examples;
    }
    public function getExamples() : ?Examples
    {
        return $this->examples;
    }
    public function setEncoding(?Encodings $encoding) : void
    {
        $this->encoding = $encoding;
    }
    public function getEncoding() : ?Encodings
    {
        return $this->encoding;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('schema', $this->schema);
        $record->put('example', $this->example);
        $record->put('examples', $this->examples);
        $record->put('encoding', $this->encoding);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

