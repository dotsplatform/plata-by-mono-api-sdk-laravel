<?php
/**
 * Description of InvoiceCancelListItem.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Resources\Invoices;

use Dots\Data\DTO;
use Dots\PlataByMono\App\Client\Resources\Consts\CancelInvoiceStatus;
use Dots\PlataByMono\App\Client\Resources\Consts\CurrencyCode;
use Dots\PlataByMono\App\Client\Resources\PlataByMonoDateTime;

class InvoiceCancelItemDTO extends DTO
{
    protected CancelInvoiceStatus $status;

    protected int $amount;

    protected CurrencyCode $ccy;

    protected PlataByMonoDateTime $createdDate;

    protected PlataByMonoDateTime $modifiedDate;

    protected string $approvalCode;

    protected string $rrn;

    protected string $extRef;

    public function getStatus(): CancelInvoiceStatus
    {
        return $this->status;
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

    public function getApprovalCode(): string
    {
        return $this->approvalCode;
    }

    public function getRrn(): string
    {
        return $this->rrn;
    }

    public function getExtRef(): string
    {
        return $this->extRef;
    }
}
