<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
/**
 * @extends \PSX\Record\Record<Header>
 */
#[Description('A map of Header Objects, the key is the name of the header.')]
class Headers extends \PSX\Record\Record
{
}

