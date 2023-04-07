<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;


class OAuthFlow implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $authorizationUrl = null;
    protected ?string $tokenUrl = null;
    protected ?string $refreshUrl = null;
    protected ?Scopes $scopes = null;
    public function setAuthorizationUrl(?string $authorizationUrl) : void
    {
        $this->authorizationUrl = $authorizationUrl;
    }
    public function getAuthorizationUrl() : ?string
    {
        return $this->authorizationUrl;
    }
    public function setTokenUrl(?string $tokenUrl) : void
    {
        $this->tokenUrl = $tokenUrl;
    }
    public function getTokenUrl() : ?string
    {
        return $this->tokenUrl;
    }
    public function setRefreshUrl(?string $refreshUrl) : void
    {
        $this->refreshUrl = $refreshUrl;
    }
    public function getRefreshUrl() : ?string
    {
        return $this->refreshUrl;
    }
    public function setScopes(?Scopes $scopes) : void
    {
        $this->scopes = $scopes;
    }
    public function getScopes() : ?Scopes
    {
        return $this->scopes;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('authorizationUrl', $this->authorizationUrl);
        $record->put('tokenUrl', $this->tokenUrl);
        $record->put('refreshUrl', $this->refreshUrl);
        $record->put('scopes', $this->scopes);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

