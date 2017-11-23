<?php
/**
 * @copyright 2017 Jan-Simon Winkelmann <winkelmann@blue-metallic.de>
 * @license MIT
 */

namespace Eth8505\ZfSymfonyConsole\Factory;

use Eth8505\ZfSymfonyConsole\ConsoleCommandManager;
use Interop\Container\ContainerInterface;
use Symfony\Component\Console;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Factory class for console application
 */
class ApplicationFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

        $config = $container->get('Config')['zf-symfony-console'] ?? [];

        $app = new Console\Application(
            $config['application']['name'] ?? 'eth8505 zf-symfony-console',
            $config['application']['version'] ?? 'dev'
        );

        foreach ($container->get(ConsoleCommandManager::class)->createAllCommands() AS $command) {
            $app->add($command);
        }

        return $app;

    }

}
