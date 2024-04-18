<?php
/**
 * Description of CreatePaymentMerchantPaymInfo.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Resources;

use Dots\Data\DTO;
use Dots\PlataByMono\App\Client\Resources\Fiscalization\FiscalizationItems;

class MerchantPaymInfo extends DTO
{
    protected string $reference;

    protected string $destination;

    protected ?string $comment;

    protected ?array $customerEmails;

    protected ?FiscalizationItems $basketOrder;

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getCustomerEmails(): ?array
    {
        return $this->customerEmails;
    }

    public function getBasketOrder(): ?FiscalizationItems
    {
        return $this->basketOrder;
    }
}
