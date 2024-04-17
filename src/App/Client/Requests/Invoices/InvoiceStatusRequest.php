<?php
/**
 * Description of StatusPaymentRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Requests\Invoices;


use Dots\App\Client\Requests\BasePlataByMonoRequest;
use Dots\App\Client\Responses\InvoiceStatusResponseDTO;
use Saloon\Http\Response;

class InvoiceStatusRequest extends BasePlataByMonoRequest
{
    private const ENDPOINT = 'api/merchant/invoice/status';

    public function __construct(
        protected readonly string $invoiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }

    public function createDtoFromResponse(Response $response): InvoiceStatusResponseDTO
    {
        return InvoiceStatusResponseDTO::fromResponse($response);
    }

}