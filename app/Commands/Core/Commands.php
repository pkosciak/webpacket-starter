<?php

declare(strict_types=1);


namespace App\Commands\Core;

class Commands
{
    public function example1() {
        \WP_CLI::success('example1 command execution');
    }

    public function example2() {
        \WP_CLI::success('example2 command execution');
    }
}