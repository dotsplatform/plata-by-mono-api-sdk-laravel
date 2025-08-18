<?php
/**
 * Description of RemoveInvoiceRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Requests\Invoices;

use Dots\PlataByMono\App\Client\Requests\Invoices\DTO\RemoveInvoiceDTO;
use Dots\PlataByMono\App\Client\Requests\PostPlataByMonoRequest;

class RemoveInvoiceRequest extends PostPlataByMonoRequest
{
    private const ENDPOINT = 'api/merchant/invoice/remove';

    public function __construct(
        protected readonly RemoveInvoiceDTO $dto,
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
