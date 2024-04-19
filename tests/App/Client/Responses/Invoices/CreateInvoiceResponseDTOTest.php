<?php
/**
 * Description of CreateInvoiceResponseDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Responses\Invoices;

use Dots\PlataByMono\App\Client\Responses\Invoices\CreateInvoiceResponseDTO;
use Tests\TestCase;

class CreateInvoiceResponseDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = CreateInvoiceResponseDTO::fromArray([
            'invoiceId' => '123456789',
            'pageUrl' => 'https://example.com/invoice/123456789',
        ]);

        $this->assertEquals(
            $dto->toArray(),
            CreateInvoiceResponseDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    /**
     * @dataProvider fromArrayDataProvider
     */
    public function testFromArray(array $data, array $expectedData): void
    {
        $dto = CreateInvoiceResponseDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'invoiceId' => '123456789',
                    'pageUrl' => 'https://example.com/invoice/123456789',
                ],
                'expectedData' => [
                    'invoiceId' => '123456789',
                    'pageUrl' => 'https://example.com/invoice/123456789',
                ],
            ],
        ];
    }
}
