<?php

namespace Eth8505\ZfSymfonyConsole;

use Eth8505\ZfSymfonyConsole\Command\CommandInterface;
use Zend\ServiceManager\AbstractPluginManager;

class ConsoleCommandManager extends AbstractPluginManager
{

    /**
     * @var string
     */
    protected $instanceOf = CommandInterface::class;

}
