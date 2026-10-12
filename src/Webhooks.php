<?php

declare(strict_types = 1);

namespace PSX\OpenAPI;

use PSX\Schema\Attribute\Description;
/**
 * @extends \PSX\Record\Record<PathItem>
 */
#[Description('The incoming webhooks that MAY be received as part of this API and that the API consumer MAY choose to implement. The key name is a unique string to refer to each webhook, while the (optionally referenced) Path Item Object describes a request that may be initiated by the API provider and the expected responses.')]
class Webhooks extends \PSX\Record\Record
{
}

