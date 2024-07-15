<?php
/**
 * Description of FinalizeInvoiceDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Requests\Invoices\DTO;

use Dots\PlataByMono\App\Client\Requests\Invoices\DTO\FinalizeInvoiceDTO;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class FinalizeInvoiceDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = FinalizeInvoiceDTO::fromArray([
            'invoiceId' => 'test_invoice_id',
            'amount' => 100,
            'items' => [
                [
                    'name' => 'test_item_1',
                    'qty' => 1,
                    'sum' => 10,
                    'code' => 'code',
                ],
            ],
        ]);

        $this->assertEquals(
            $dto->toArray(),
            FinalizeInvoiceDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    #[DataProvider('fromArrayDataProvider')]
    public function testFromArray(
        array $data,
        array $expectedData,
    ): void {
        $dto = FinalizeInvoiceDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'invoiceId' => 'test_invoice_id',
                    'amount' => 100,
                    'items' => [
                        [
                            'name' => 'test_item_1',
                            'qty' => 1,
                            'sum' => 10,
                            'code' => 'code',
                        ],
                    ],
                ],
                'expectedData' => [
                    'invoiceId' => 'test_invoice_id',
                    'amount' => 100,
                    'items' => [
                        [
                            'name' => 'test_item_1',
                            'qty' => 1,
                            'sum' => 10,
                            'code' => 'code',
                        ],
                    ],
                ],
            ],

            'Test expects params are null by default' => [
                'data' => [
                    'invoiceId' => 'test_invoice_id',
                    'amount' => 100,
                ],
                'expectedData' => [
                    'invoiceId' => 'test_invoice_id',
                    'amount' => 100,
                    'items' => null,
                ],
            ],

            'Test expects params are null if null provider' => [
                'data' => [
                    'invoiceId' => 'test_invoice_id',
                    'amount' => 100,
                    'items' => null,
                ],
                'expectedData' => [
                    'invoiceId' => 'test_invoice_id',
                    'amount' => 100,
                    'items' => null,
                ],
            ],
        ];
    }
}
