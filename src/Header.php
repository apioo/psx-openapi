<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;

#[Description('The Header Object follows the structure of the Parameter Object with the following changes:  1. `name` MUST NOT be specified, it is given in the corresponding `headers` map. 1. `in` MUST NOT be specified, it is implicitly in `header`. 1. All traits that are affected by the location MUST be applicable to a location of `header` (for example, `style`).')]
class Header implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $description = null;
    protected ?bool $required = null;
    protected ?bool $deprecated = null;
    protected ?bool $allowEmptyValue = null;
    protected ?string $style = null;
    protected ?bool $explode = null;
    protected ?bool $allowReserved = null;
    protected mixed $schema = null;
    protected mixed $example = null;
    protected ?Examples $examples = null;
    protected ?MediaTypes $content = null;
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setRequired(?bool $required) : void
    {
        $this->required = $required;
    }
    public function getRequired() : ?bool
    {
        return $this->required;
    }
    public function setDeprecated(?bool $deprecated) : void
    {
        $this->deprecated = $deprecated;
    }
    public function getDeprecated() : ?bool
    {
        return $this->deprecated;
    }
    public function setAllowEmptyValue(?bool $allowEmptyValue) : void
    {
        $this->allowEmptyValue = $allowEmptyValue;
    }
    public function getAllowEmptyValue() : ?bool
    {
        return $this->allowEmptyValue;
    }
    public function setStyle(?string $style) : void
    {
        $this->style = $style;
    }
    public function getStyle() : ?string
    {
        return $this->style;
    }
    public function setExplode(?bool $explode) : void
    {
        $this->explode = $explode;
    }
    public function getExplode() : ?bool
    {
        return $this->explode;
    }
    public function setAllowReserved(?bool $allowReserved) : void
    {
        $this->allowReserved = $allowReserved;
    }
    public function getAllowReserved() : ?bool
    {
        return $this->allowReserved;
    }
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
    public function setContent(?MediaTypes $content) : void
    {
        $this->content = $content;
    }
    public function getContent() : ?MediaTypes
    {
        return $this->content;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('description', $this->description);
        $record->put('required', $this->required);
        $record->put('deprecated', $this->deprecated);
        $record->put('allowEmptyValue', $this->allowEmptyValue);
        $record->put('style', $this->style);
        $record->put('explode', $this->explode);
        $record->put('allowReserved', $this->allowReserved);
        $record->put('schema', $this->schema);
        $record->put('example', $this->example);
        $record->put('examples', $this->examples);
        $record->put('content', $this->content);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

