<?php
/**
 * Copyright (c) 2020. File is part of F4 Resource Booking WordPress plugin developed by F4 Developer (Stanisław
 * Kowański - https://www.f4dev.me) for Hufiec ZHP Piaseczno (http://piaseczno.zhp.pl). F4 Resource Booking project and
 * all it's files are released under GNU GPLv3 license. For more details look for LICENSE file.
 */

/*
Plugin Name: F4 Resource Booking
Plugin URI: https://www.f4dev.me
Description: Plugin that lets to book company resources. Integrates with O365.
Version: 1.0.0
Author: F4 Developer (Stanisław Kowański)
Author URI: https://www.f4dev.me
License: GNU GPLv3
Text Domain: f4resbook

F4 Resource Booking is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

F4 Resource Booking is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <https://www.gnu.org/licenses/>.
*/

/*
 * Activation & deactivation logic
 */
// Activation logic
function f4res_activate() {
	// Register custom post type & it's taxonomies
	f4res_cpt_resource_register();
	f4res_cpt_resource_tax_resource_type_register();
	
	flush_rewrite_rules();
}

// Deactivation logic
function f4res_deactivate() {
	// Unregister custom post type
	unregister_post_type('f4res_resource');
	
	flush_rewrite_rules();
}

// Hooks register
register_activation_hook(__FILE__, 'f4res_activate');
register_deactivation_hook(__FILE__, 'f4res_deactivate');

/*
 * Custom post type - Resource
 */
// CPT
include_once 'inc/cpt/resource/resource-cpt.php';
// Taxonomies
include_once 'inc/cpt/resource/taxonomies/resource-type-taxonomy.php';

/*
 * Shortcodes
 */
// [f4res_form]
include_once 'inc/shortcodes/form/form-shortcode.php';
