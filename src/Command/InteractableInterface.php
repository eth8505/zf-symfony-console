<?php

namespace Eth8505\ZfSymfonyConsole\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface InteractableInterface extends CommandInterface
{
	public function interact(InputInterface $input, OutputInterface $output);
}
