<?php
/**
 * Description of FinalizeInvoiceDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Requests\Invoices\DTO;


use Dots\App\Client\Resources\Fiscalization\FiscalizationItems;
use Dots\Data\DTO;

class FinalizeInvoiceDTO extends DTO
{
    protected string $invoiceId;
    protected int $amount;
    protected ?FiscalizationItems $items;

    public function getInvoiceId(): string
    {
        return $this->invoiceId;
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