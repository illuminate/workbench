<?php namespace Illuminate\Workbench;

class Starter {

	/**
	 * Load the workbench vendor auto-load files.
	 *
	 * @param  string  $path
	 * @param  Illuminate\Filesystem  $files
	 * @return void
	 */
	public static function start($path, $finder = null, $files = null)
	{
		$finder = $finder ?: new \Symfony\Component\Finder\Finder;

		$files = $files ?: new \Illuminate\Filesystem;

		// We will use the finder to locate all "autoload.php" files in the workbench
		// directory, then we will include them each so that they are able to load
		// the appropriate classes and file used by the given workbench package.
		$autoloads = $finder->in($path)->files()->name('autoload.php');

		foreach ($autoloads as $file)
		{
			$files->requireOnce($file->getRealPath());
		}
	}

}