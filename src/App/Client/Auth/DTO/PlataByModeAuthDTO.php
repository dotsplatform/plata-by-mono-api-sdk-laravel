<?php
/**
 * Description of PlateByModeAuthDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Auth\DTO;

use Dots\Data\DTO;

class PlataByModeAuthDTO extends DTO
{
    protected string $accessToken;

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
}
