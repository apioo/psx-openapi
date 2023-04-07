<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Required;

#[Description('The object provides metadata about the API. The metadata MAY be used by the clients if needed, and MAY be presented in editing or documentation generation tools for convenience.')]
#[Required(array('title', 'version'))]
class Info implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $title = null;
    protected ?string $summary = null;
    protected ?string $description = null;
    protected ?string $termsOfService = null;
    protected ?Contact $contact = null;
    protected ?License $license = null;
    protected ?string $version = null;
    public function setTitle(?string $title) : void
    {
        $this->title = $title;
    }
    public function getTitle() : ?string
    {
        return $this->title;
    }
    public function setSummary(?string $summary) : void
    {
        $this->summary = $summary;
    }
    public function getSummary() : ?string
    {
        return $this->summary;
    }
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setTermsOfService(?string $termsOfService) : void
    {
        $this->termsOfService = $termsOfService;
    }
    public function getTermsOfService() : ?string
    {
        return $this->termsOfService;
    }
    public function setContact(?Contact $contact) : void
    {
        $this->contact = $contact;
    }
    public function getContact() : ?Contact
    {
        return $this->contact;
    }
    public function setLicense(?License $license) : void
    {
        $this->license = $license;
    }
    public function getLicense() : ?License
    {
        return $this->license;
    }
    public function setVersion(?string $version) : void
    {
        $this->version = $version;
    }
    public function getVersion() : ?string
    {
        return $this->version;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('title', $this->title);
        $record->put('summary', $this->summary);
        $record->put('description', $this->description);
        $record->put('termsOfService', $this->termsOfService);
        $record->put('contact', $this->contact);
        $record->put('license', $this->license);
        $record->put('version', $this->version);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

