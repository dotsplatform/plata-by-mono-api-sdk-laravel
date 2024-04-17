<?php
/**
 * Description of PlateByMonoAutentificator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Auth;


use Dots\App\Client\Auth\DTO\PlataByModeAuthDTO;
use Saloon\Http\Auth\HeaderAuthenticator;

class PlataByMonoAuthenticator extends HeaderAuthenticator
{
    public string $headerName = 'X-Token';

    public static function fromAuthDTO(PlataByModeAuthDTO $dto): static
    {
        return new static(
            accessToken: $dto->getAccessToken(),
        );
    }
}