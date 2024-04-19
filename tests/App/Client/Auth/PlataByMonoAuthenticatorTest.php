<?php
/**
 * Description of PlataByMonoAuthenticatorTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Auth;

use Dots\PlataByMono\App\Client\Auth\DTO\PlataByModeAuthDTO;
use Dots\PlataByMono\App\Client\Auth\PlataByMonoAuthenticator;
use Tests\TestCase;

class PlataByMonoAuthenticatorTest extends TestCase
{
    public function testExpectsFromAuthDTO(): void
    {
        $authDTO = PlataByModeAuthDTO::fromArray([
            'accessToken' => 'test_token',
        ]);

        $authenticator = PlataByMonoAuthenticator::fromAuthDTO($authDTO);
        $this->assertEquals($authDTO->getAccessToken(), $authenticator->accessToken);
        $this->assertEquals(PlataByMonoAuthenticator::AUTH_HEADER_NAME, $authenticator->headerName);
    }
}
