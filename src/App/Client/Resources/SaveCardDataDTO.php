<?php
/**
 * Description of CreatePaymentSaveCardDataDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Resources;


use Dots\Data\DTO;

class SaveCardDataDTO extends DTO
{
    protected bool $saveCard;
    protected string $walletId;

    public function isSaveCard(): bool
    {
        return $this->saveCard;
    }

    public function getWalletId(): string
    {
        return $this->walletId;
    }
}