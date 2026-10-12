<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
/**
 * @extends \PSX\Record\Record<MediaType>
 */
#[Description('A map containing descriptions of potential payloads. The key is a media type or media type range and the value describes it.')]
class MediaTypes extends \PSX\Record\Record
{
}

