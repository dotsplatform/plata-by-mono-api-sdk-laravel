<?php
/**
 * Description of CancelInvoiceDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Requests\Invoices\DTO;

use Dots\Data\DTO;
use Dots\PlataByMono\App\Client\Resources\Fiscalization\FiscalizationItems;

class CancelInvoiceDTO extends DTO
{
    protected string $invoiceId;

    protected ?string $extRef;

    protected int $amount; // used for partial refund

    protected ?FiscalizationItems $items;

    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    public function getExtRef(): ?string
    {
        return $this->extRef;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getItems(): ?FiscalizationItems
    {
        return $this->items;
    }
}
