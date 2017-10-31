<?php

namespace Eth8505\ZfSymfonyConsole\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface ExecutableInterface extends CommandInterface
{
	public function execute(InputInterface $input, OutputInterface $output);
}
