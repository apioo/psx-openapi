<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
/**
 * @extends \PSX\Record\Record<string>
 */
#[Description('The available scopes for the OAuth2 security scheme. A map between the scope name and a short description for it.')]
class Scopes extends \PSX\Record\Record
{
}

