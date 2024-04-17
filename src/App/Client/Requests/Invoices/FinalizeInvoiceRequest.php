<?php
/**
 * Description of FinalizeInvoiceDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Requests\Invoices;

use Dots\PlataByMono\App\Client\Requests\Invoices\DTO\FinalizeInvoiceDTO;
use Dots\PlataByMono\App\Client\Requests\PostPlataByMonoRequest;

class FinalizeInvoiceRequest extends PostPlataByMonoRequest
{
    private const ENDPOINT = 'api/merchant/invoice/finalize';

    public function __construct(
        private readonly FinalizeInvoiceDTO $dto,
    ) {
    }

    protected function defaultBody(): array
    {
        return $this->dto->toArray();
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }
}
