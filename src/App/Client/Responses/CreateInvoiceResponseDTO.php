<?php
/**
 * Description of CreatePaymentResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Responses;

class CreateInvoiceResponseDTO extends PlataByMonoResponseDTO
{
    protected string $invoiceId;
    protected string $pageUrl;

    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    public function getPageUrl(): string
    {
        return $this->pageUrl;
    }
}