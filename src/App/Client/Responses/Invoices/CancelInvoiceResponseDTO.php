<?php
/**
 * Description of CancelInvoiceResposeDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Responses\Invoices;

use Dots\PlataByMono\App\Client\Resources\Consts\CancelInvoiceStatus;
use Dots\PlataByMono\App\Client\Resources\PlataByMonoDateTime;
use Dots\PlataByMono\App\Client\Responses\PlataByMonoResponseDTO;

class CancelInvoiceResponseDTO extends PlataByMonoResponseDTO
{
    protected CancelInvoiceStatus $status;

    protected PlataByMonoDateTime $createdDate;

    protected PlataByMonoDateTime $modifiedDate;

    public function getStatus(): CancelInvoiceStatus
    {
        return $this->status;
    }

    public function getCreatedDate(): PlataByMonoDateTime
    {
        return $this->createdDate;
    }

    public function getModifiedDate(): PlataByMonoDateTime
    {
        return $this->modifiedDate;
    }
}
