<?php
/**
 * Description of CreatePaymentResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Responses\Invoices;

use Dots\PlataByMono\App\Client\Responses\PlataByMonoResponseDTO;

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
