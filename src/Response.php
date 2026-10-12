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
    /**
     * @var \PSX\Record\Record<Link>|null
     */
    protected ?\PSX\Record\Record $links = null;
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
    /**
     * @param \PSX\Record\Record<Link>|null $links
     */
    public function setLinks(?\PSX\Record\Record $links): void
    {
        $this->links = $links;
    }
    /**
     * @return \PSX\Record\Record<Link>|null
     */
    public function getLinks(): ?\PSX\Record\Record
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

