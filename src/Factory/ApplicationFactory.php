<?php

    namespace Eth8505\ZfSymfonyConsole\Factory;

use Interop\Container\ContainerInterface;
use Symfony\Component\Console;
use Zend\ServiceManager\Factory\FactoryInterface;

class ApplicationFactory implements FactoryInterface {

    /**
     * @inheritdoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $config = $container->get('Config')['zf-symfony-console'] ?? [];

		$app = new Console\Application(
            $config['application']['name'] ?? 'eth8505 zf-symfony-console',
            $config['application']['version'] ?? 'dev'
        );

		return $app;

	}

}
