<?php
/**
 * Description of PaymentStatusResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Responses\Invoices;

use Dots\PlataByMono\App\Client\Resources\Consts\CurrencyCode;
use Dots\PlataByMono\App\Client\Resources\Invoices\InvoiceCancelList;
use Dots\PlataByMono\App\Client\Resources\Invoices\InvoicePaymentInfo;
use Dots\PlataByMono\App\Client\Resources\Invoices\InvoiceStatus;
use Dots\PlataByMono\App\Client\Resources\PlataByMonoDateTime;
use Dots\PlataByMono\App\Client\Resources\WalletData;
use Dots\PlataByMono\App\Client\Responses\PlataByMonoResponseDTO;

class InvoiceStatusResponseDTO extends PlataByMonoResponseDTO
{
    protected string $invoiceId;

    protected InvoiceStatus $status;

    protected ?string $failureReason;

    protected ?int $errCode;

    protected int $amount;

    protected CurrencyCode $ccy;

    protected int $finalAmount;

    protected PlataByMonoDateTime $createdDate;

    protected PlataByMonoDateTime $modifiedDate;

    protected string $reference;

    protected string $destination;

    protected InvoiceCancelList $cancelList;

    protected InvoicePaymentInfo $paymentInfo;

    protected WalletData $walletData;

    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    public function getStatus(): InvoiceStatus
    {
        return $this->status;
    }

    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }

    public function getErrCode(): ?int
    {
        return $this->errCode;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCcy(): CurrencyCode
    {
        return $this->ccy;
    }

    public function getFinalAmount(): int
    {
        return $this->finalAmount;
    }

    public function getCreatedDate(): PlataByMonoDateTime
    {
        return $this->createdDate;
    }

    public function getModifiedDate(): PlataByMonoDateTime
    {
        return $this->modifiedDate;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getCancelList(): InvoiceCancelList
    {
        return $this->cancelList;
    }

    public function getPaymentInfo(): InvoicePaymentInfo
    {
        return $this->paymentInfo;
    }

    public function getWalletData(): WalletData
    {
        return $this->walletData;
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
        if ($this->status->isFailed()) {
            return true;
        }

        return ! empty($this->getErrCode()) || ! empty($this->getFailureReason());
    }
}
