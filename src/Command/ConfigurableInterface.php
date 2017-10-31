<?php

namespace Eth8505\ZfSymfonyConsole\Command;

interface ConfigurableInterface extends CommandInterface
{
	public function configure();
}
