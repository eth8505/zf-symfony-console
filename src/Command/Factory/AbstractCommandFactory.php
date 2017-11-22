<?php

    namespace Eth8505\ZfSymfonyConsole\Command\Factory;

use Eth8505\ZfSymfonyConsole\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

abstract class AbstractCommandFactory implements FactoryInterface,
	Command\ConfigurableInterface,
    Command\InitializableInterface,
    Command\InteractableInterface,
	Command\ExecutableInterface
{
	/**
	 * @var Command\Adapter
	 */
	protected $adapter;

	protected $command;

	abstract public function configure();

    public function getCommand()
	{
		if ($this->command === null)
		{
			$this->command = $this();
			if (!$this->command instanceof Command\CommandInterface)
			{
				throw new \InvalidArgumentException(sprintf(
					'Command (%s) must implement %s\CommandInterface'
					, get_class($this->command)
					, __NAMESPACE__
				));
			}
			$this->command->setAdapter($this->adapter);
		}
		return $this->command;
	}

	public function initialize(InputInterface $input, OutputInterface $output)
	{
		$command = $this->getCommand();
		if ($command instanceof Command\InitializableInterface)
		{
			$command->initialize($input, $output);
		}
	}

	public function interact(InputInterface $input, OutputInterface $output)
	{
		$command = $this->getCommand();
		if ($command instanceof Command\InteractableInterface)
		{
			$command->interact($input, $output);
		}
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		$command = $this->getCommand();
		if ($command instanceof Command\ExecutableInterface)
		{
			$command->execute($input, $output);
		}
	}

	public function setAdapter(Command\AdapterInterface $adapter)
	{
		$this->adapter = $adapter;
	}

	public function getAdapter()
	{
		if (!$this->adapter)
		{
			$this->adapter = new Command\Adapter($this);
		}

		return $this->adapter;
	}
}
