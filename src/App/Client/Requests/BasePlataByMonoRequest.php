<?php
/**
 * Description of BaseGlovoRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BasePlataByMonoRequest extends Request
{
    protected Method $method = Method::GET;
}
