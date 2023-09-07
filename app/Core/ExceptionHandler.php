<?php

declare(strict_types=1);

namespace App\Core;

final class ExceptionHandler
{
    public static function handleException(\Throwable $e): void
    {
        self::printException($e);
    }

    public static function printException(\Throwable $e): void
    {
        // custom error handling
    }
}