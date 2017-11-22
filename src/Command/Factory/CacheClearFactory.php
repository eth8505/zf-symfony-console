<?php

    namespace Eth8505\ZfSymfonyConsole\Command\Factory;

    use Eth8505\ZfSymfonyConsole\Command\CacheClear;
    use Interop\Container\ContainerInterface;

    class CacheClearFactory extends AbstractCommandFactory
    {
        public function configure()
        {
            $this->adapter
                ->setName('rdn-console:cache-clear')
                ->setDescription('Clear the cache directory')
            ;
        }

        public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL) {
            return new CacheClear([]);
        }
    }