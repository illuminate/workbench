<?php namespace Illuminate\Workbench\Console;

use Illuminate\Console\Command;
use Illuminate\Workbench\Package;
use Illuminate\Workbench\PackageCreator;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class WorkbenchMakeCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'workbench:make';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new package workbench';

	/**
	 * The package creator instance.
	 *
	 * @var Illuminate\Workbench\PackageCreator
	 */
	protected $creator;

	/**
	 * Create a new make workbench command instance.
	 *
	 * @param  Illuminate\Workbench\PackageCreator  $creator
	 * @return void
	 */
	public function __construct(PackageCreator $creator)
	{
		parent::__construct();

		$this->creator = $creator;
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$path = $this->laravel['path.base'].'/workbench';

		$this->creator->create($this->buildPackage(), $path);
	}

	/**
	 * Build the package details from user input.
	 *
	 * @return Illuminate\Workbench\Package
	 */
	protected function buildPackage()
	{
		$vendor = camel_case($this->ask('What is vendor name of the package?'));

		$name = camel_case($this->ask('What is the package name?'));

		$author = $this->ask('What is your name?');

		$email = $this->ask('What is your e-mail address?');

		return new Package($vendor, $name, $author, $email);
	}

}