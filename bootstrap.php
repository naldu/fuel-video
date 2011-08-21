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

Autoloader::add_core_namespace('Video');

Autoloader::add_classes(array(
	'Video\\Video'							=> __DIR__.'/classes/video.php',
	'Video\\Video_Driver'					=> __DIR__.'/classes/video/driver.php',
	'Video\\Video_Youtube'					=> __DIR__.'/classes/video/youtube.php',
	'Video\\Video_Vimeo'					=> __DIR__.'/classes/video/vimeo.php',
	'Video\\InvalidVideoDriverException'	=> __DIR__.'/classes/video.php',
	'Video\\InvalidVideoConfigException'	=> __DIR__.'/classes/video.php',
));