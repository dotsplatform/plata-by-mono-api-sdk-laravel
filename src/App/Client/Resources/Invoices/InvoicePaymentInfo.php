<?php
/**
 * Description of PaymentInfo.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Resources\Invoices;


use Dots\Data\DTO;

class InvoicePaymentInfo extends DTO
{
    protected string $maskedPan;
    protected string $approvalCode;
    protected string $rrn;
    protected string $tranId;
    protected string $terminal;
    protected string $bank;
    protected string $paymentSystem;
    protected string $paymentMethod;
    protected int|float $fee;
    protected string $country;
}