<?php
/**
 * @copyright 2017 Jan-Simon Winkelmann <winkelmann@blue-metallic.de>
 * @license MIT
 */

namespace Eth8505\ZfSymfonyConsole;

/**
 * Hinting interface for configuration of console commands via module classes
 */
interface ConsoleCommandProviderInterface
{

    /**
     * Get console command config
     *
     * @return array
     */
    public function getConsoleCommandConfig();

}