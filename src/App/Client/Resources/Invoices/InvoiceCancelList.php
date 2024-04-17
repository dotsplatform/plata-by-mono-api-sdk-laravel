<?php
/**
 * Description of InvoiceCancelList.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Resources\Invoices;


use Dots\Data\FromArrayable;
use Illuminate\Database\Eloquent\Collection;

class InvoiceCancelList extends Collection implements FromArrayable
{
    public static function fromArray(array $data): static
    {
        return new self(array_map(
            fn(array $item) => InvoiceCancelItemDTO::fromArray($item),
            $data,
        ));
    }
}