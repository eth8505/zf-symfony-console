<?php
/**
 * @copyright 2017 Jan-Simon Winkelmann <winkelmann@blue-metallic.de>
 * @license MIT
 */

namespace Eth8505\ZfSymfonyConsole;

use Eth8505\ZfSymfonyConsole\Factory\ApplicationFactory;
use Eth8505\ZfSymfonyConsole\Factory\ConsoleCommandManagerFactory;
use Interop\Container\ContainerInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Listener\ServiceListener;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\ModuleManagerInterface;

/**
 * ZF3 Symfony console module class
 */
class Module implements InitProviderInterface, ServiceProviderInterface
{

    /**
     * @inheritdoc
     */
    public function init(ModuleManagerInterface $manager) {

        /** @var ModuleManager $manager */
        /** @var ContainerInterface $serviceManager */
        $serviceManager = $manager->getEvent()->getParam('ServiceManager');
        /** @var ServiceListener $serviceListener */
        $serviceListener = $serviceManager->get('ServiceListener');

        $serviceListener->addServiceManager(
            ConsoleCommandManager::class,
            'zfsymfonyconsole_commands',
            ConsoleCommandProviderInterface::class,
            'getConsoleCommandConfig'
        );

    }

    /**
     * @inheritdoc
     */
    public function getServiceConfig() {

	    return [
	        'factories' => [
	            'Eth8505\\ZfSymfonyConsole\\Application' => ApplicationFactory::class,
                ConsoleCommandManager::class => ConsoleCommandManagerFactory::class
            ]
        ];

    }

}
