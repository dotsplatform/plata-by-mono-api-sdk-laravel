<?php
/**
 * Description of CancelInvoiceResposeDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Responses;


use Dots\App\Client\Resources\Consts\CancelInvoiceStatus;
use Dots\App\Client\Resources\PlataByMonoDateTime;

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