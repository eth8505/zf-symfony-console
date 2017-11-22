<?php

namespace Eth8505\ZfSymfonyConsole;

use Eth8505\ZfSymfonyConsole\Command\CommandInterface;
use Zend\ServiceManager\AbstractPluginManager;

class ConsoleCommandManager extends AbstractPluginManager
{P

    /**
     * @var string
     */
    protected $instanceOf = CommandInterface::class;

    public function __construct($configInstanceOrParentLocator = NULL, array $config = []) {

        $this->initializers[] = [$this, 'registerWithConsole'];
        parent::__construct($configInstanceOrParentLocator, $config);



    }

    /**
     * Inject a helper instance with the registered renderer
     *
     * @param CommandInterface $command
     */
    public function registerWithConsole(CommandInterface $command) {

        die('initialize');

    }

}
