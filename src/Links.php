<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
/**
 * @extends \PSX\Record\Record<Link>
 */
#[Description('A map of Link Objects, the key is a short name for the link.')]
class Links extends \PSX\Record\Record
{
}

