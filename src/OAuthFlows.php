<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;


class OAuthFlows implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?OAuthFlow $implicit = null;
    protected ?OAuthFlow $password = null;
    protected ?OAuthFlow $clientCredentials = null;
    protected ?OAuthFlow $authorizationCode = null;
    public function setImplicit(?OAuthFlow $implicit) : void
    {
        $this->implicit = $implicit;
    }
    public function getImplicit() : ?OAuthFlow
    {
        return $this->implicit;
    }
    public function setPassword(?OAuthFlow $password) : void
    {
        $this->password = $password;
    }
    public function getPassword() : ?OAuthFlow
    {
        return $this->password;
    }
    public function setClientCredentials(?OAuthFlow $clientCredentials) : void
    {
        $this->clientCredentials = $clientCredentials;
    }
    public function getClientCredentials() : ?OAuthFlow
    {
        return $this->clientCredentials;
    }
    public function setAuthorizationCode(?OAuthFlow $authorizationCode) : void
    {
        $this->authorizationCode = $authorizationCode;
    }
    public function getAuthorizationCode() : ?OAuthFlow
    {
        return $this->authorizationCode;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('implicit', $this->implicit);
        $record->put('password', $this->password);
        $record->put('clientCredentials', $this->clientCredentials);
        $record->put('authorizationCode', $this->authorizationCode);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

