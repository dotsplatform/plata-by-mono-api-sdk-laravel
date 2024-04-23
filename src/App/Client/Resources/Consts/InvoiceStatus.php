<?php
/**
 * Description of PaymentStatus.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Resources\Consts;

enum InvoiceStatus: string
{
    case CREATED = 'created';
    case PROCESSING = 'processing';
    case HOLD = 'hold';
    case SUCCESS = 'success';
    case FAILURE = 'failure';
    case REVERSED = 'reversed';
    case EXPIRED = 'expired';

    public function isExpired(): bool
    {
        return $this === self::EXPIRED;
    }

    public function isOnHold(): bool
    {
        return $this === self::HOLD;
    }

    public function isCaptured(): bool
    {
        return $this === self::SUCCESS;
    }

    public function isFailed(): bool
    {
        return $this === self::FAILURE || $this === self::EXPIRED;
    }
}
