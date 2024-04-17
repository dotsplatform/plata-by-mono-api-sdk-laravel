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
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Throwable;

class PlataByMonoConnector extends Connector
{
    use AlwaysThrowOnErrors;

    private const HOST = 'https://api.monobank.ua';

    public function __construct(
        private readonly PlataByModeAuthDTO $authDto,
    ) {
    }

    public function createInvoice(CreateInvoiceDTO $dto): CreateInvoiceResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new CreateInvoiceRequest($dto))->dto();
    }

    public function invoiceStatus(string $invoiceId): InvoiceStatusResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new InvoiceStatusRequest($invoiceId))->dto();
    }

    public function finalizeInvoice(FinalizeInvoiceDTO $dto): void
    {
        $this->authenticateRequests();

        $this->send(new FinalizeInvoiceRequest($dto));
    }

    public function cancelInvoice(CancelInvoiceDTO $dto): CancelInvoiceResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new CancelInvoiceRequest($dto))->dto();
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function resolveBaseUrl(): string
    {
        return self::HOST;
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
