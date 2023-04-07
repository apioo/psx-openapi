<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;


class SecurityScheme implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $type = null;
    protected ?string $description = null;
    protected ?string $name = null;
    protected ?string $in = null;
    protected ?string $scheme = null;
    protected ?string $bearerFormat = null;
    protected ?OAuthFlows $flows = null;
    protected ?string $openIdConnectUrl = null;
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setName(?string $name) : void
    {
        $this->name = $name;
    }
    public function getName() : ?string
    {
        return $this->name;
    }
    public function setIn(?string $in) : void
    {
        $this->in = $in;
    }
    public function getIn() : ?string
    {
        return $this->in;
    }
    public function setScheme(?string $scheme) : void
    {
        $this->scheme = $scheme;
    }
    public function getScheme() : ?string
    {
        return $this->scheme;
    }
    public function setBearerFormat(?string $bearerFormat) : void
    {
        $this->bearerFormat = $bearerFormat;
    }
    public function getBearerFormat() : ?string
    {
        return $this->bearerFormat;
    }
    public function setFlows(?OAuthFlows $flows) : void
    {
        $this->flows = $flows;
    }
    public function getFlows() : ?OAuthFlows
    {
        return $this->flows;
    }
    public function setOpenIdConnectUrl(?string $openIdConnectUrl) : void
    {
        $this->openIdConnectUrl = $openIdConnectUrl;
    }
    public function getOpenIdConnectUrl() : ?string
    {
        return $this->openIdConnectUrl;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('type', $this->type);
        $record->put('description', $this->description);
        $record->put('name', $this->name);
        $record->put('in', $this->in);
        $record->put('scheme', $this->scheme);
        $record->put('bearerFormat', $this->bearerFormat);
        $record->put('flows', $this->flows);
        $record->put('openIdConnectUrl', $this->openIdConnectUrl);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

