<?php

declare(strict_types=1);

namespace App\Commands\Core;

class Starter
{
    /**
     * Create main command: wp starter
     * Creates subcommand: wp starter example1 and wp starter example2 (See Cli\Core\Commands.php)
     * Creates hook before to run before: wp starter example1
     * @since 1.0.0
     */
    public function __construct(){
        \WP_CLI::add_command('starter', Commands::class);
        \WP_CLI::add_hook('before_invoke:starter example1', function(){
            \WP_CLI::success('test before invoke hook');
        });
    }

}