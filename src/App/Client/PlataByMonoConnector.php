<?php
/**
 * Description of PlateByMonoConnector.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client;


use Dots\App\Client\Auth\DTO\PlataByModeAuthDTO;
use Dots\App\Client\Auth\PlataByMonoAuthenticator;
use Dots\App\Client\Exceptions\PlataByMonoException;
use Dots\App\Client\Requests\Invoices\CancelInvoiceRequest;
use Dots\App\Client\Requests\Invoices\CreateInvoiceRequest;
use Dots\App\Client\Requests\Invoices\DTO\CancelInvoiceDTO;
use Dots\App\Client\Requests\Invoices\DTO\CreateInvoiceDTO;
use Dots\App\Client\Requests\Invoices\DTO\FinalizeInvoiceDTO;
use Dots\App\Client\Requests\Invoices\FinalizeInvoiceRequest;
use Dots\App\Client\Requests\Invoices\InvoiceStatusRequest;
use Dots\App\Client\Responses\CancelInvoiceResponseDTO;
use Dots\App\Client\Responses\CreateInvoiceResponseDTO;
use Dots\App\Client\Responses\ErrorResponseDTO;
use Dots\App\Client\Responses\InvoiceStatusResponseDTO;
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