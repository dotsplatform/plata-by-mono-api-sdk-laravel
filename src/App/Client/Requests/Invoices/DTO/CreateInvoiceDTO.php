<?php
/**
 * Description of CreatePaymentDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Requests\Invoices\DTO;

use Dots\Data\DTO;
use Dots\PlataByMono\App\Client\Resources\Consts\CurrencyCode;
use Dots\PlataByMono\App\Client\Resources\Consts\PaymentType;
use Dots\PlataByMono\App\Client\Resources\MerchantPaymInfo;
use Dots\PlataByMono\App\Client\Resources\SaveCardDataDTO;

class CreateInvoiceDTO extends DTO
{
    protected int $amount;

    protected CurrencyCode $ccy;

    protected MerchantPaymInfo $merchantPaymInfo;

    protected string $redirectUrl;

    protected string $webHookUrl;

    protected ?int $validity;

    protected PaymentType $paymentType;

    protected ?string $qrId;

    protected ?string $code;

    protected ?SaveCardDataDTO $saveCardData;

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCcy(): CurrencyCode
    {
        return $this->ccy;
    }

    public function getMerchantPaymInfo(): MerchantPaymInfo
    {
        return $this->merchantPaymInfo;
    }

    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    public function getWebHookUrl(): string
    {
        return $this->webHookUrl;
    }

    public function getValidity(): ?int
    {
        return $this->validity;
    }

    public function getPaymentType(): PaymentType
    {
        return $this->paymentType;
    }

    public function getQrId(): ?string
    {
        return $this->qrId;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getSaveCardData(): ?SaveCardDataDTO
    {
        return $this->saveCardData;
    }
}
