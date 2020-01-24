<?php
/**
 * Copyright (c) 2020. File is part of F4 Resource Booking WordPress plugin developed by F4 Developer (Stanisław
 * Kowański - https://www.f4dev.me) for Hufiec ZHP Piaseczno (http://piaseczno.zhp.pl). F4 Resource Booking project and
 * all it's files are released under GNU GPLv3 license. For more details look for LICENSE file.
 */

/**
 * Registers Resource type taxonomy for Resource custom post type
 */
function f4res_cpt_resource_tax_resource_type_register() {
	$labels = array(
		'name'                       => __('Resource types', 'f4resbook'),
		'singular_name'              => __('Resource type', 'f4resbook'),
		'search_items'               => __('Search resource types', 'f4resbook'),
		'popular_items'              => __('Popular resource types', 'f4resbook'),
		'all_items'                  => __('All resource types', 'f4resbook'),
		'edit_item'                  => __('Edit resource type', 'f4resbook'),
		'view_item'                  => __('View resource type', 'f4resbook'),
		'update_item'                => __('Update resource type', 'f4resbook'),
		'add_new_item'               => __('Add new resource type', 'f4resbook'),
		'new_item_name'              => __('New resource type name', 'f4resbook'),
		'separate_items_with_commas' => __('Separate resource types with commas', 'f4resbook'),
		'add_or_remove_items'        => __('Add or remove resource types', 'f4resbook'),
		'choose_from_most_used'      => __('Choose from most used resource types', 'f4resbook'),
		'not_found'                  => __('No resource types found', 'f4resbook'),
		'no_terms'                   => __('No resource types', 'f4resbook'),
		'items_list_navigation'      => __('Resource types list navigation', 'f4resbook'),
		'items_list'                 => __('Resource types list', 'f4resbook'),
		'most_used'                  => __('Most used', 'f4resbook'),
		'back_to_items'              => __('Back to resource types', 'f4resbook'),
	);
	
	$rewrite = array(
		'slug'         => 'resource_types',
		'hierarchical' => true
	);
	
	$settings = array(
		'labels'            => $labels,
		'description'       => __('Resource types - like rooms, items etc. - to organize your bookings', 'f4resbook'),
		'show_tagcloud'     => false,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'rewrite'           => $rewrite
	);
	
	register_taxonomy('f4res_resource_type', array('f4res_resource'), $settings);
}

add_action('init', 'f4res_cpt_resource_tax_resource_type_register');

