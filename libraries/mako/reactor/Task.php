<?php

namespace mako\reactor;

use \mako\CLI;

/**
* Base task.
*
* @author     Frederic G. Østby
* @copyright  (c) 2008-2012 Frederic G. Østby
* @license    http://www.makoframework.com/license
*/

abstract class Task
{
	//---------------------------------------------
	// Class variables
	//---------------------------------------------

	// Nothing here

	//---------------------------------------------
	// Class constructor, destructor etc ...
	//---------------------------------------------

	// Nothing here

	//---------------------------------------------
	// Class methods
	//---------------------------------------------

	/**
	* Run method must always be included.
	*
	* @access  public
	*/

	abstract public function run();

	/**
	* Display help if non-existant method is called.
	*
	* @access  public
	*/

	public function __call($name, $arguments)
	{
		CLI::stderr(vsprintf("Unknown task action '%s'", array($name)));
	}
}

/** -------------------- End of file --------------------**/