<?php
/**
 * Description of PlateByMonoException.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App\Client\Exceptions;

use Dots\PlataByMono\App\Client\Responses\ErrorResponseDTO;
use Exception;
use Throwable;

class PlataByMonoException extends Exception
{
    public function __construct(
        private ErrorResponseDTO $errorResponseDTO,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getErrorResponseDTO(): ErrorResponseDTO
    {
        return $this->errorResponseDTO;
    }
}
