<?php
/**
 * Description of PaymentStatus.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Resources\Invoices;

enum InvoiceStatus: string
{
    case CREATED = 'created';
    case PROCESSING = 'processing';
    case HOLD = 'hold';
    case SUCCESS = 'success';
    case FAILURE = 'failure';
    case REVERSED = 'reversed';
    case EXPIRED = 'expired';
}
