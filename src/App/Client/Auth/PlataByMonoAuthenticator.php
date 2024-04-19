<?php
/**
 * Description of PlateByMonoAutentificator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Auth;

use Dots\PlataByMono\App\Client\Auth\DTO\PlataByModeAuthDTO;
use Saloon\Http\Auth\HeaderAuthenticator;

class PlataByMonoAuthenticator extends HeaderAuthenticator
{
    public const AUTH_HEADER_NAME = 'X-Token';

    public static function fromAuthDTO(PlataByModeAuthDTO $dto): static
    {
        return new static(
            accessToken: $dto->getAccessToken(),
            headerName: self::AUTH_HEADER_NAME,
        );
    }
}
