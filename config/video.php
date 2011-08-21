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

return array(

	'drivers' => array(
		'youtube', 'vimeo',
	),
	
	'default' => array(
		'width' => 400,
		'height' => 350,
		'auto_render' => false,
	),
	
	'presets' => array(
		'default' => array(),
	),
	
	'embed_html' => array(
		'youtube' => '<iframe width="{width}" height="{height}" src="http://www.youtube.com/embed/{youtube_link}" frameborder="0" allowfullscreen></iframe>',
		'vimeo' => '<iframe src="http://player.vimeo.com/video/{vimeo_link}?title=0&amp;byline=0&amp;portrait=0" width="{width}" height="{height}" frameborder="0"></iframe>',
	),
	
);