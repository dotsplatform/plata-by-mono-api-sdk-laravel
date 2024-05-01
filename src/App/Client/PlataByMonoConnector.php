<?php
/**
 * Description of PlateByMonoConnector.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client;

use Dots\PlataByMono\App\Client\Auth\DTO\PlataByModeAuthDTO;
use Dots\PlataByMono\App\Client\Auth\PlataByMonoAuthenticator;
use Dots\PlataByMono\App\Client\Exceptions\PlataByMonoException;
use Dots\PlataByMono\App\Client\Requests\Invoices\CancelInvoiceRequest;
use Dots\PlataByMono\App\Client\Requests\Invoices\CreateInvoiceRequest;
use Dots\PlataByMono\App\Client\Requests\Invoices\DTO\CancelInvoiceDTO;
use Dots\PlataByMono\App\Client\Requests\Invoices\DTO\CreateInvoiceDTO;
use Dots\PlataByMono\App\Client\Requests\Invoices\DTO\FinalizeInvoiceDTO;
use Dots\PlataByMono\App\Client\Requests\Invoices\FinalizeInvoiceRequest;
use Dots\PlataByMono\App\Client\Requests\Invoices\InvoiceStatusRequest;
use Dots\PlataByMono\App\Client\Responses\ErrorResponseDTO;
use Dots\PlataByMono\App\Client\Responses\Invoices\CancelInvoiceResponseDTO;
use Dots\PlataByMono\App\Client\Responses\Invoices\CreateInvoiceResponseDTO;
use Dots\PlataByMono\App\Client\Responses\Invoices\InvoiceStatusResponseDTO;
use RuntimeException;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Throwable;

class PlataByMonoConnector extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct(
        private readonly PlataByModeAuthDTO $authDto,
    ) {
    }

    /**
     * @throws PlataByMonoException
     */
    public function createInvoice(CreateInvoiceDTO $dto): CreateInvoiceResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new CreateInvoiceRequest($dto))->dto();
    }

    /**
     * @throws PlataByMonoException
     */
    public function invoiceStatus(string $invoiceId): InvoiceStatusResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new InvoiceStatusRequest($invoiceId))->dto();
    }

    /**
     * @throws PlataByMonoException
     */
    public function finalizeInvoice(FinalizeInvoiceDTO $dto): void
    {
        $this->authenticateRequests();

        $this->send(new FinalizeInvoiceRequest($dto));
    }

    /**
     * @throws PlataByMonoException
     */
    public function cancelInvoice(CancelInvoiceDTO $dto): CancelInvoiceResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new CancelInvoiceRequest($dto))->dto();
    }

    protected function defaultHeaders(): array
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        if (config('plata-by-mono.cmsName')) {
            $headers['X-Cms'] = config('plata-by-mono.cmsName');
        }

        return $headers;
    }

    public function resolveBaseUrl(): string
    {
        $host = config('plata-by-mono.host');
        if (! is_string($host)) {
            throw new RuntimeException('Invalid Plata by Mono host');
        }

        return $host;
    }

    private function authenticateRequests(): void
    {
        $this->authenticate(
            PlataByMonoAuthenticator::fromAuthDTO($this->authDto),
        );
    }

    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        $errorResponse = ErrorResponseDTO::fromResponse($response);

        return new PlataByMonoException($errorResponse);
    }
}
