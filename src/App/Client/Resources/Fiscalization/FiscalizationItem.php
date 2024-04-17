<?php
/**
 * Description of FiscalizationItem.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Resources\Fiscalization;

use Dots\Data\DTO;

class FiscalizationItem extends DTO
{
    protected string $name;

    protected int $qty;

    protected int $sum;

    protected string $code;

    protected ?string $barcode;

    protected ?string $header;

    protected ?array $tax;

    protected ?string $uktzed;

    public function getName(): string
    {
        return $this->name;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function getSum(): int
    {
        return $this->sum;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function getHeader(): ?string
    {
        return $this->header;
    }

    public function getTax(): ?array
    {
        return $this->tax;
    }

    public function getUktzed(): ?string
    {
        return $this->uktzed;
    }
}
