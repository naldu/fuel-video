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

abstract class Video_Driver {

	/**
	 * Data received from static::parse_url
	 */
	protected $data;
	
	/**
	 * Config data
	 */
	protected $config = array();
	
	/**
	 * Constructor
	 */
	public function __construct($data, $config)
	{
		$this->data = $data;
		$this->config = (array) $config;
	}
	
	abstract public static function parse_url($url);
	abstract public function __toString();
	
}