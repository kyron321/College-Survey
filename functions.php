<?php
$functions = array_diff(scandir(get_template_directory() . '/functions'), array('.', '..', '.DS_Store'));
foreach ($functions as $function) {
	include('functions/' . $function);
}

function exclude_menu_item($items, $args)
{
	if (isset($args->exclude_from_footer) && $args->exclude_from_footer === true) {
		foreach ($items as $key => $item) {
			if ($item->ID == 541) {
				unset($items[$key]);
			}
		}
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'exclude_menu_item', 10, 2);
