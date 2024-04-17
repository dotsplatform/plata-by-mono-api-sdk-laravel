<?php
/**
 * Description of PaymentType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\App\Client\Resources\Consts;


enum PaymentType: string
{
    case DEBIT = 'debit';
    case HOLD = 'hold';
}