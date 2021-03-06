<?php

//------------------------------------------------------------------------------------------
// Define global convenience functions
//------------------------------------------------------------------------------------------

if(!function_exists('__'))
{
	/**
	* Alias of mako\I18n::translate()
	*
	* Returns a translated string of the current language. 
	* If no translation exists then the submitted string will be returned.
	*
	* @access  public
	* @param   string   Text to translate
	* @param   array   (optional) Value or array of values to replace in the translated text
	* @param   string  (optional) Name of the language you want to translate to
	* @return  string
	*/

	function __($string, array $vars = array(), $language = null)
	{
		return mako\I18n::translate($string, $vars, $language);
	}
}

if(!function_exists('dump_var'))
{
	/**
	* Works like var_dump except that it wraps the variable in <pre> tags.
	*
	* @access  public
	* @param   mixed   Variable you want to dump
	*/

	function dump_var()
	{
		ob_start();

		call_user_func_array('var_dump', func_get_args());

		echo '<pre>' . ob_get_clean() . '</pre>';
	}
}

//------------------------------------------------------------------------------------------
// Setup autoloading of third party libraries
//------------------------------------------------------------------------------------------

// Doctrine

/*require MAKO_LIBRARIES_PATH . '/doctrine/Doctrine.php';

spl_autoload_register(array('Doctrine', 'autoload'));*/

// Swift Mailer

/*require MAKO_LIBRARIES_PATH . '/swiftmailer/swift_required.php';*/

// Zend Framework

/*set_include_path(get_include_path() . PATH_SEPARATOR . MAKO_LIBRARIES_PATH);

require MAKO_LIBRARIES_PATH . '/Zend/Loader/Autoloader.php';

Zend_Loader_Autoloader::getInstance();*/

/** -------------------- End of file --------------------**/