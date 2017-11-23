<?php
/**
 * @copyright 2017 Jan-Simon Winkelmann <winkelmann@blue-metallic.de>
 * @license MIT
 */

namespace Eth8505\ZfSymfonyConsole\Factory;

use Eth8505\ZfSymfonyConsole\ConsoleCommandManager;
use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * Factory for console command plugin manager
 */
class ConsoleCommandManagerFactory extends AbstractPluginManagerFactory
{

    const PLUGIN_MANAGER_CLASS = ConsoleCommandManager::class;

}
