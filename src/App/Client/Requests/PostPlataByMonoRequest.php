<?php
/**
 * Description of BaseGlovoRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\App\Client\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

abstract class PostPlataByMonoRequest extends BasePlataByMonoRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
}
