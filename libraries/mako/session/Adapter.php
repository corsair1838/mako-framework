<?php

namespace mako\session;

/**
* Session adapter.
*
* @author     Frederic G. Østby
* @copyright  (c) 2008-2012 Frederic G. Østby
* @license    http://www.makoframework.com/license
*/

abstract class Adapter
{
	//---------------------------------------------
	// Class variables
	//---------------------------------------------

	/**
	* Max session lifetime.
	*
	* @var int
	*/

	protected $maxLifetime;

	/**
	* Session name.
	*
	* @var string
	*/

	protected $sessionName;

	//---------------------------------------------
	// Class constructor, destructor etc ...
	//---------------------------------------------

	/**
	* Constructor.
	*
	* @access  public
	*/
	
	public function __construct()
	{
		$this->maxLifetime = ini_get('session.gc_maxlifetime');
	}

	//---------------------------------------------
	// Class methods
	//---------------------------------------------

	/**
	* Session "constructor".
	*
	* @access  public
	* @param   string   Save path
	* @param   string   Session name
	* @return  boolean
	*/

	public function open($savePath, $sessionName)
	{
		$this->sessionName = $sessionName;

		return true;
	}

	/**
	* Session "destructor".
	*
	* @access  public
	* @return  boolean
	*/

	public function close()
	{
		return true;
	}

	/**
	* Garbage collector.
	*
	* @access  public
	* @param   int      Lifetime in secods
	* @return  boolean
	*/

	public function gc($maxLifetime)
	{
		return true;
	}

	abstract public function read($id);

	abstract public function write($id, $data);

	abstract public function destroy($id);
}

/** -------------------- End of file --------------------**/