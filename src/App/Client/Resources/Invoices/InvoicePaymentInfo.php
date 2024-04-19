<?php
/**
 * Description of PaymentInfo.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Resources\Invoices;

use Dots\Data\DTO;

class InvoicePaymentInfo extends DTO
{
    protected ?string $maskedPan;

    protected string $approvalCode;

    protected string $rrn;

    protected string $tranId;

    protected string $terminal;

    protected string $bank;

    protected string $paymentSystem;

    protected string $paymentMethod;

    protected int $fee;

    protected string $country;

    public function getMaskedPan(): ?string
    {
        return $this->maskedPan;
    }

    public function getApprovalCode(): string
    {
        return $this->approvalCode;
    }

    public function getRrn(): string
    {
        return $this->rrn;
    }

    public function getTranId(): string
    {
        return $this->tranId;
    }

    public function getTerminal(): string
    {
        return $this->terminal;
    }

    public function getBank(): string
    {
        return $this->bank;
    }

    public function getPaymentSystem(): string
    {
        return $this->paymentSystem;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function getFee(): int
    {
        return $this->fee;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}
