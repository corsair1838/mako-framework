<?php

namespace mako;

/**
* Config class.
*
* @author     Frederic G. Østby
* @copyright  (c) 2008-2012 Frederic G. Østby
* @license    http://www.makoframework.com/license
*/

use \mako\Arr;
use \mako\Mako;
use \RuntimeException;

class Config
{
	//---------------------------------------------
	// Class variables
	//---------------------------------------------

	/**
	* Config array.
	*
	* @var array
	*/

	protected static $config;

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
	* Returns config value or entire config array from a file.
	*
	* @access  public
	* @param   string  Config key
	* @param   mixed   (optional) Default value to return if config value doesn't exist
	* @return  mixed
	*/

	public static function get($key, $default = null)
	{
		$keys = explode('.', $key, 2);

		if(!isset(static::$config[$keys[0]]))
		{
			$path = Mako::path('config', $keys[0]);

			if(file_exists($path) === false)
			{
				throw new RuntimeException(vsprintf("%s(): The '%s' config file does not exist.", array(__METHOD__, $keys[0])));
			}	

			static::$config[$keys[0]] = include($path);
		}

		if(!isset($keys[1]))
		{
			return static::$config[$keys[0]];
		}
		else
		{
			return Arr::get(static::$config[$keys[0]], $keys[1], $default);
		}
	}

	/**
	* Sets a config value.
	*
	* @access  public
	* @param   string  Config key
	* @param   mixed   Config value
	*/

	public static function set($key, $value)
	{
		$config = strtok($key, '.');

		if(!isset(static::$config[$config]))
		{
			static::get($config);
		}

		Arr::set(static::$config, $key, $value);
	}

	/**
	* Deletes a value from the configuration.
	*
	* @access  public
	* @param   string   Config key
	* @return  boolean
	*/

	public static function delete($key)
	{
		return Arr::delete(static::$config, $key);
	}
}

/** -------------------- End of file --------------------**/