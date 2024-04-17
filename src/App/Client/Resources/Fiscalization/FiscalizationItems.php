<?php
/**
 * Description of FiscalizationItems.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Resources\Fiscalization;


use Dots\Data\FromArrayable;
use Illuminate\Support\Collection;

class FiscalizationItems extends Collection implements FromArrayable
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => FiscalizationItem::fromArray($item),
            $data,
        ));
    }
}