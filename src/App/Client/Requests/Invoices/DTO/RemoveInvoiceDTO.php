<?php
/**
 * Description of RemoveInvoiceDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Requests\Invoices\DTO;

use Dots\Data\DTO;

class RemoveInvoiceDTO extends DTO
{
    protected string $invoiceId;

    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }
}
