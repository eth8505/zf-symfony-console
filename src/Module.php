<?php

namespace Eth8505\ZfSymfonyConsole;

use Interop\Container\ContainerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\Listener\ServiceListener;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\ModuleManagerInterface;

class Module implements ConfigProviderInterface, InitProviderInterface
{

    /**
     * @inheritdoc
     */
    public function init(ModuleManagerInterface $manager) {

        /** @var ModuleManager $moduleManager */
        /** @var ContainerInterface $serviceManager */
        $serviceManager = $moduleManager->getEvent()->getParam('ServiceManager');
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

}
