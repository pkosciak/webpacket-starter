<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Traits\Modular;

abstract class BaseException extends \Exception
{
    use Modular;

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->setupModule();
    }

    public function getTranslatedMessage(): string {
        return __($this->getMessage(), THEME_TEXTDOMAIN);
    }
}
