<?php
/**
 * Description of PlataByMonoWebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Resources\Webhooks;

use Dots\Data\DTO;
use Dots\PlataByMono\App\Client\Resources\Consts\CurrencyCode;
use Dots\PlataByMono\App\Client\Resources\Invoices\InvoiceStatus;
use Dots\PlataByMono\App\Client\Resources\PlataByMonoDateTime;

class PlataByMonoWebhookDTO extends DTO
{
    protected string $invoiceId;

    protected int $amount;

    protected CurrencyCode $ccy;

    protected PlataByMonoDateTime $createdDate;

    protected PlataByMonoDateTime $modifiedDate;

    protected string $destination;

    protected string $reference;

    protected InvoiceStatus $status;

    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCcy(): CurrencyCode
    {
        return $this->ccy;
    }

    public function getCreatedDate(): PlataByMonoDateTime
    {
        return $this->createdDate;
    }

    public function getModifiedDate(): PlataByMonoDateTime
    {
        return $this->modifiedDate;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getStatus(): InvoiceStatus
    {
        return $this->status;
    }

    public function isExpired(): bool
    {
        return $this->status->isExpired();
    }

    public function isOnHold(): bool
    {
        return $this->status->isOnHold();
    }

    public function isCaptured(): bool
    {
        return $this->status->isCaptured();
    }

    public function isFailed(): bool
    {
        return $this->status->isFailed();
    }
}
