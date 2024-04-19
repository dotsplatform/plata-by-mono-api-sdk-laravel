<?php
/**
 * Description of PaymentWalletData.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Resources;

use Dots\Data\DTO;

class WalletData extends DTO
{
    protected string $cardToken;

    protected string $walletId;

    protected string $status;

    public function getCardToken(): string
    {
        return $this->cardToken;
    }

    public function getWalletId(): string
    {
        return $this->walletId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
