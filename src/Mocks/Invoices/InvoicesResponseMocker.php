<?php
/**
 * Description of InvoicesResponseMocker.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\Mocks\Invoices;

use Dots\PlataByMono\App\Client\Requests\Invoices\CancelInvoiceRequest;
use Dots\PlataByMono\App\Client\Requests\Invoices\CreateInvoiceRequest;
use Dots\PlataByMono\App\Client\Requests\Invoices\FinalizeInvoiceRequest;
use Dots\PlataByMono\App\Client\Requests\Invoices\InvoiceStatusRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class InvoicesResponseMocker
{
    public static function mockAllSuccess(): void
    {
        self::mockSuccessCreateInvoice();
        self::mockSuccessInvoiceStatus();
        self::mockSuccessFinalizeInvoice();
        self::mockSuccessCancelInvoice();
    }

    public static function mockAllFail(): void
    {
        self::mockFailCreateInvoice();
        self::mockFailInvoiceStatus();
        self::mockFailFinalizeInvoice();
        self::mockFailCancelInvoice();
    }

    public static function mockSuccessCreateInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateSuccessCreateInvoice($data);
        MockClient::global([
            CreateInvoiceRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockFailCreateInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateFailCreateInvoice($data);
        MockClient::global([
            CreateInvoiceRequest::class => MockResponse::make($data, 400),
        ]);

        return $data;
    }

    public static function mockSuccessInvoiceStatus(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateSuccessInvoiceStatus($data);
        MockClient::global([
            InvoiceStatusRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockFailInvoiceStatus(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateFailInvoiceStatus($data);
        MockClient::global([
            InvoiceStatusRequest::class => MockResponse::make($data, 400),
        ]);

        return $data;
    }

    public static function mockSuccessFinalizeInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateSuccessFinalizeInvoice($data);
        MockClient::global([
            FinalizeInvoiceRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockFailFinalizeInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateFailFinalizeInvoice($data);
        MockClient::global([
            FinalizeInvoiceRequest::class => MockResponse::make($data, 400),
        ]);

        return $data;
    }

    public static function mockSuccessCancelInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateFailCancelInvoice($data);
        MockClient::global([
            CancelInvoiceRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockFailCancelInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateSuccessCancelInvoice($data);
        MockClient::global([
            CancelInvoiceRequest::class => MockResponse::make($data, 400),
        ]);

        return $data;
    }
}
