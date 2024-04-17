<?php
/**
 * Description of CreatePaymentRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Requests\Invoices;


use Dots\App\Client\Requests\Invoices\DTO\CreateInvoiceDTO;
use Dots\App\Client\Requests\PostPlataByMonoRequest;
use Dots\App\Client\Responses\CreateInvoiceResponseDTO;
use Saloon\Http\Response;

class CreateInvoiceRequest extends PostPlataByMonoRequest
{
    private const ENDPOINT = 'api/merchant/invoice/create';

    public function __construct(
        protected readonly CreateInvoiceDTO $dto,
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

    public function createDtoFromResponse(Response $response): CreateInvoiceResponseDTO
    {
        return CreateInvoiceResponseDTO::fromResponse($response);
    }
}