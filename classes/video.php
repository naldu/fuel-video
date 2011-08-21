<?php

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Video
 * @version    1.0
 * @author     Frank de Jonge <info@frenky.net>
 * @license    MIT License
 * @copyright  2010 - 2011 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Video;

class InvalidVideoDriverException extends \Fuel_Exception {};
class InvalidVideoConfigException extends \Fuel_Exception {};

abstract class Video {

	/**
	 * Returns a formatted embed code if matched to one of the drivers.
	 *
	 * @param	string			$url		the url to check
	 * @param	string|array	$config		preset identifier or config array
	 * @param	array			$drivers	which drivers to check, when empty defaults to config
	 * @param	string			default		what to return on no match, anything other that string will return the input url
	 * @return	mixed			the drives instance which matched to the url, not matched? $defaul if string, else $url
	 */
	public static function embed($url, $config = 'default', $drivers = array(), $default = false)
	{
		empty($drivers) and $drivers = (array) \Config::get('video.drivers');
		
		is_string($config) and $config = (array) \Config::get('video.presets.'.$config, array());
		
		if( ! is_array($config))
		{
			throw new \InvalidVideoConfigException('Video::embed $config must either be an array of a string');
		}
		
		$config = $config + \Config::get('video.default', array());
		
		foreach((array) $drivers as $driver)
		{
			$class = '\\Video\\Video_'.ucfirst($driver);
			
			if( ! class_exists($class, true))
			{
				throw new \InvalidVideoDriverException('Driver '.$driver.' could not be found.');
			}
			
			if(($result = call_user_func(array($class, 'parse_url'), $url)))
			{
				$video = new $class($result, $config);
				
				if($config['auto_render'] === true)
				{
					echo $video;
					return;
				}
				
				return $video;
			}
		}
		
		return is_string($default) ? $default : $url;
	}

	/**
	 * Class init, config loading.
	 */
	public static function _init()
	{
		\Config::load('video', true);
	}

}