<?php
/**
 * Description of CancelInvoiceRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Requests\Invoices;


use Dots\App\Client\Requests\Invoices\DTO\CancelInvoiceDTO;
use Dots\App\Client\Requests\PostPlataByMonoRequest;
use Dots\App\Client\Responses\CancelInvoiceResponseDTO;
use Saloon\Http\Response;

class CancelInvoiceRequest extends PostPlataByMonoRequest
{
    private const ENDPOINT = 'api/merchant/invoice/cancel';

    public function __construct(
        private readonly CancelInvoiceDTO $dto,
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

    public function createDtoFromResponse(Response $response): CancelInvoiceResponseDTO
    {
        return CancelInvoiceResponseDTO::fromResponse($response);
    }
}