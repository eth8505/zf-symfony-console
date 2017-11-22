<?php

namespace Eth8505\ZfSymfonyConsole;

use Eth8505\ZfSymfonyConsole\Command\CacheClear;
use Eth8505\ZfSymfonyConsole\Command\Factory\CacheClearFactory;
use Eth8505\ZfSymfonyConsole\Factory\ApplicationFactory;
use Interop\Container\ContainerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Listener\ServiceListener;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\ModuleManagerInterface;

class Module implements ConfigProviderInterface, InitProviderInterface, ServiceProviderInterface, ConsoleCommandProviderInterface
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
	public function getConfig()
	{
		return include __DIR__ . '/../config/module.config.php';
	}

    /**
     * @inheritdoc
     */
    public function getServiceConfig() {

	    return [
	        'factories' => [
	            'Eth8505\\ZfSymfonyConsole\\Application' => ApplicationFactory::class
            ]
        ];

    }

    public function getConsoleCommandConfig() {

        return [
            'factories' => [
                CacheClear::class => CacheClearFactory::class
            ]
        ];

    }

}
