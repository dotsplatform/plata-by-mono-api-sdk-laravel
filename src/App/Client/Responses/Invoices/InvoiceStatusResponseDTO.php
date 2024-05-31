<?php
/**
 * Description of PaymentStatusResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Responses\Invoices;

use Dots\PlataByMono\App\Client\Resources\Consts\CurrencyCode;
use Dots\PlataByMono\App\Client\Resources\Consts\InvoiceStatus;
use Dots\PlataByMono\App\Client\Resources\Invoices\InvoiceCancelList;
use Dots\PlataByMono\App\Client\Resources\Invoices\InvoicePaymentInfo;
use Dots\PlataByMono\App\Client\Resources\PlataByMonoDateTime;
use Dots\PlataByMono\App\Client\Resources\WalletData;
use Dots\PlataByMono\App\Client\Responses\PlataByMonoResponseDTO;

/**
 * @note This class used for the payment status and webhooks
 * Remember, a webhook can do not have any field, for example, the webhooks
 * with status Created does not have finalAmount, when status is Success
 * the webhook data is same that response from the payment status request
 */
class InvoiceStatusResponseDTO extends PlataByMonoResponseDTO
{
    protected string $invoiceId;

    protected InvoiceStatus $status;

    protected ?string $failureReason;

    protected ?int $errCode;

    protected int $amount;

    protected CurrencyCode $ccy;

    protected int $finalAmount = 0;

    protected PlataByMonoDateTime $createdDate;

    protected PlataByMonoDateTime $modifiedDate;

    protected string $reference;

    protected string $destination;

    protected ?InvoiceCancelList $cancelList;

    protected ?InvoicePaymentInfo $paymentInfo;

    protected ?WalletData $walletData;

    public static function fromArray(array $data): static
    {
        $data['createdDate'] = PlataByMonoDateTime::fromString($data['createdDate']);
        $data['modifiedDate'] = PlataByMonoDateTime::fromString($data['modifiedDate']);

        return parent::fromArray($data);
    }

    public function toArray(): array
    {
        $data = parent::toArray();
        $data['createdDate'] = $this->getCreatedDate()->__toString();
        $data['modifiedDate'] = $this->getModifiedDate()->__toString();

        return $data;
    }

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

    public function getCancelList(): ?InvoiceCancelList
    {
        return $this->cancelList;
    }

    public function getPaymentInfo(): ?InvoicePaymentInfo
    {
        return $this->paymentInfo;
    }

    public function getWalletData(): ?WalletData
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

    public function isProcessing(): bool
    {
        return $this->status->isProcessing();
    }
}
