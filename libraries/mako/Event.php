<?php

namespace mako;

/**
* Event class.
*
* @author     Frederic G. Østby
* @copyright  (c) 2008-2012 Frederic G. Østby
* @license    http://www.makoframework.com/license
*/

class Event
{
	//---------------------------------------------
	// Class variables
	//---------------------------------------------

	/**
	* Array of events.
	*
	* @var array
	*/

	protected static $events = array();

	//---------------------------------------------
	// Class constructor, destructor etc ...
	//---------------------------------------------

	/**
	* Protected constructor since this is a static class.
	*
	* @access  protected
	*/

	protected function __construct()
	{
		// Nothing here
	}

	//---------------------------------------------
	// Class methods
	//---------------------------------------------

	/**
	* Adds an event listener to the queue.
	*
	* @access  public
	* @param   string    Event name
	* @param   callback  Event callback
	*/

	public static function register($name, $callback)
	{
		static::$events[$name][] = $callback;
	}

	/**
	* Returns TRUE if an event listener is registered for the event and FALSE if not.
	*
	* @access  public
	* @param   string   Event name
	* @return  boolean
	*/

	public static function registered($name)
	{
		return isset(static::$events[$name]);
	}

	/**
	* Clears all event listeners for an event.
	*
	* @access  public
	* @param   string  Event name
	**/

	public static function clear($name)
	{
		unset(static::$events[$name]);
	}

	/**
	* Runs all callbacks for an event and returns an array 
	* contaning the return values of each callback.
	*
	* @access  public
	* @param   string  Event name
	* @param   array   (optional) Callback parameters
	* @return  array
	*/

	public static function trigger($name, array $params = array())
	{
		$values = array();

		if(isset(static::$events[$name]))
		{
			foreach(static::$events[$name] as $event)
			{
				$values[] = call_user_func_array($event, $params);
			}
		}

		return $values;
	}
}

/** -------------------- End of file --------------------**/