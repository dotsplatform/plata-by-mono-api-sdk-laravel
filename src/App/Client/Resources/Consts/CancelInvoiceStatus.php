<?php
/**
 * Description of CancelInvoiceStatus.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Resources\Consts;

enum CancelInvoiceStatus: string
{
    case PROCESSING = 'processing';
    case SUCCESS = 'success';
    case FAILURE = 'failure';
}
