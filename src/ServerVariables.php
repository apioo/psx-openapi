<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
/**
 * @extends \PSX\Record\Record<ServerVariable>
 */
#[Description('A map between a variable name and its value. The value is used for substitution in the server\'s URL template.')]
class ServerVariables extends \PSX\Record\Record
{
}

