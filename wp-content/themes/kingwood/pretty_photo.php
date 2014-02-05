<?php
$th_array = get_custom_field('post_image:to_image_array','thumbnail');
$full_array = get_custom_field('post_image:to_image_array');
//print_r($full_array);
$i = 0;
if (is_single()){
	foreach ($th_array as $item) {
		print '<a href="'.$full_array[$i][0].'" rel="prettyPhoto[pp_gal]"><img src="'.$item[0].'" alt="'.get_the_title().'"/></a>';
		$i++;
	}
}
else{
	print '<a href="'.$full_array[$i][0].'" rel="prettyPhoto[pp_gal]"><img src="'.$th_array[$i][0].'" alt="'.get_the_title().'"/></a>';	
}
?>