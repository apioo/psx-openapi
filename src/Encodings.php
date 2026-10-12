<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
/**
 * @extends \PSX\Record\Record<Encoding>
 */
#[Description('A map between a property name and its encoding information. The key, being the property name, MUST exist in the schema as a property.')]
class Encodings extends \PSX\Record\Record
{
}

