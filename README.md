Simple Vimeo and Youtube embedding
==================================

# Usage

Use Video::embed to embed either youtube or vimeo movies.

	echo \Video::embed('http://www.youtube.com/watch?v=5kJ09FpWoaM');
	echo \Video::embed('http://vimeo.com/27182687');
	
Need to pass the height and/or width on the fly?

	echo \Video::embed('http://www.youtube.com/watch?v=5kJ09FpWoaM', array(
		'width' => 600,
		'height' => 300,
	));
	
Or setup a preset in the config and use that:

	echo \Video::embed('http://www.youtube.com/watch?v=5kJ09FpWoaM', 'my_preset');