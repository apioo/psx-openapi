<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
/**
 * @extends \PSX\Record\Record<\PSX\OpenAPI\Callback>
 */
#[Description('A map of possible out-of band callbacks related to the parent operation. The key is a unique identifier for the Callback Object.')]
class Callbacks extends \PSX\Record\Record
{
}

