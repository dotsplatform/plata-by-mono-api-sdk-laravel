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

    public function isSuccess(): bool
    {
        return $this->status !== CancelInvoiceStatus::FAILURE;
    }
}
