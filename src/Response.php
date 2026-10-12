<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;

#[Description('Describes a single response from an API operation, including design-time, static `links` to operations based on the response.')]
class Response implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $description = null;
    protected ?Headers $headers = null;
    protected ?MediaTypes $content = null;
    protected ?Links $links = null;
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setHeaders(?Headers $headers): void
    {
        $this->headers = $headers;
    }
    public function getHeaders(): ?Headers
    {
        return $this->headers;
    }
    public function setContent(?MediaTypes $content): void
    {
        $this->content = $content;
    }
    public function getContent(): ?MediaTypes
    {
        return $this->content;
    }
    public function setLinks(?Links $links): void
    {
        $this->links = $links;
    }
    public function getLinks(): ?Links
    {
        return $this->links;
    }
    /**
     * @return \PSX\Record\RecordInterface<mixed>
     */
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('description', $this->description);
        $record->put('headers', $this->headers);
        $record->put('content', $this->content);
        $record->put('links', $this->links);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

