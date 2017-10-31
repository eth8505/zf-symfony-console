<?php

namespace Eth8505\ZfSymfonyConsole\Command;

interface AdapterInterface
{
	public function setCommand(CommandInterface $command);

	/**
	 * @return CommandInterface
	 */
	public function getCommand();
}
