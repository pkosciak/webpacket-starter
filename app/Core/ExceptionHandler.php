<?php

declare(strict_types=1);

namespace App\Core;

use JetBrains\PhpStorm\NoReturn;

final class ExceptionHandler
{
    #[NoReturn] public static function handleException(\Throwable $e): void
    {
        self::printException($e);
    }

    #[NoReturn] public static function printException(\Throwable $e): void
    {
        wp_die('Uncaught '.get_class($e).', code: ' . $e->getCode() . "<br />Message: " . htmlentities($e->getMessage())."\n");
    }
}