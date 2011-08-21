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

class Video_Vimeo extends \Video_Driver {

	/**
	 * Check weather the url matches the driver and
	 * returns the data needed for the constructor on success.
	 *
	 * @param	string	$url		the url to check
	 * @return	mixed				the url data on succes, false if there was no match
	 */
	public static function parse_url($url)
	{
		if(stripos($url, 'vimeo') === false)
		{
			return false;
		}
		
		preg_match('/[vimeo\.com\/]([0-9]+)/', $url, $matches);
				
		if(count($matches) === 0)
		{
			return false;
		}
		
		return $matches[1];
	}
	
	/**
	 * For easy usage.
	 *
	 * @return	string		the formatted embed code
	 */
	public function __toString()
	{
		$replace = $this->config;
		$replace['vimeo_link'] = $this->data;
		
		$embed = (string) \Config::get('video.embed_html.vimeo', '');
				
		foreach($replace as $key => $value)
		{
			$embed = str_replace('{'.$key.'}', $value, $embed);
		}
		
		return $embed;
	}

}