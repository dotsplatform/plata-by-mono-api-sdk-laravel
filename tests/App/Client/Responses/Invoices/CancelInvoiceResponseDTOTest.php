<?php
/**
 * Description of CancelInvoiceResponseDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Responses\Invoices;

use Dots\PlataByMono\App\Client\Responses\Invoices\CancelInvoiceResponseDTO;
use Tests\TestCase;

class CancelInvoiceResponseDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = CancelInvoiceResponseDTO::fromArray([
            'status' => 'success',
            'createdDate' => '2024-04-18T14:36:53+00:00',
            'modifiedDate' => '2024-04-18T14:38:10+00:00',
        ]);

        $this->assertEquals(
            $dto->toArray(),
            CancelInvoiceResponseDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    /**
     * @dataProvider fromArrayDataProvider
     */
    public function testFromArray(
        array $data,
        array $expectedData,
    ): void {
        $dto = CancelInvoiceResponseDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'status' => 'success',
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                ],
                'expectedData' => [
                    'status' => 'success',
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                ],
            ],
        ];
    }
}
