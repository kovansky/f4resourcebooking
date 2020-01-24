<?php
/**
 * Copyright (c) 2020. File is part of F4 Resource Booking WordPress plugin developed by F4 Developer (Stanisław Kowański - https://www.f4dev.me)
 * for Hufiec ZHP Piaseczno (http://piaseczno.zhp.pl). F4 Resource Booking project and all it's files are released under GNU GPLv3 license.
 * For more details look for LICENSE file.
 */

/**
 * Registers "Resource" post type
 */
function f4res_cpt_resource_register() {
	$labels = array(
		'name'                     => __('Resources', 'f4resbook'),
		'singular_name'            => __('Resource', 'f4resbook'),
		'add_new'                  => _x('Add new', 'trip', 'f4resbook'),
		'add_new_item'             => __('Add new resource', 'f4resbook'),
		'edit_item'                => __('Edit resource', 'f4resbook'),
		'new_item'                 => __('New resource', 'f4resbook'),
		'view_item'                => __('View resource', 'f4resbook'),
		'view_items'               => __('View resources', 'f4resbook'),
		'search_items'             => __('Search resources', 'f4resbook'),
		'not_found'                => __('No resources found', 'f4resbook'),
		'not_found_in_trash'       => __('No resources found in trash', 'f4resbook'),
		'all_items'                => __('All resources', 'f4resbook'),
		'archives'                 => __('Resources archives', 'f4resbook'),
		'attributes'               => __('Resources attributes', 'f4resbook'),
		'insert_into_item'         => __('Insert into resource', 'f4resbook'),
		'uploaded_to_this_item'    => __('Uploaded to this resource', 'f4resbook'),
		'featured_image'           => __('Featured image', 'f4resbook'),
		'set_featured_image'       => __('Set featured image', 'f4resbook'),
		'remove_featured_image'    => __('Remove featured image', 'f4resbook'),
		'use_featured_image'       => __('Use featured image', 'f4resbook'),
		'filter_items_list'        => __('Filter trips list', 'f4resbook'),
		'items_list_navigation'    => __('Resources list navigation', 'f4resbook'),
		'items_list'               => __('Resources list', 'f4resbook'),
		'item_published'           => __('Resource published', 'f4resbook'),
		'item_published_privately' => __('Resource published privately', 'f4resbook'),
		'item_reverted_to_draft'   => __('Resource reverted to draft', 'f4resbook'),
		'item_scheduled'           => __('Resource scheduled', 'f4resbook'),
		'item_updated'             => __('Resource updated', 'f4resbook'),
	);
	
	$rewrite = array(
		'slug'  => 'resource',
		'pages' => false
	);
	
	$settings = array(
		'labels'           => $labels,
		'description'      => __('Resource offered for share', 'f4resbook'),
		'menu_position'    => 30,
		'public'           => true,
		'show_in_menu'     => true,
		'capability_type'  => 'post',
		'menu_icon'        => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDgwMCA4MDAiIGhlaWdodD0iODAwcHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA4MDAgODAwIiB3aWR0aD0iODAwcHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik00MDAuMDA0LDM0LjU4Yy0yMDEuNDk5LDAtMzY1LjQyMiwxNjMuOTI3LTM2NS40MjIsMzY1LjQxOGMwLDE5MC43MiwxNDYuOTE1LDM0Ny43MDcsMzMzLjQ5MSwzNjMuOTQgIGMzLjYzNSwwLjM2MSw3LjQ0NCwwLjY1NCwxMS40MDcsMC44NjFjMS4xMzgsMC4wNjksMi4yNzUsMC4xMjksMy40MjksMC4xODFjMy40NjQsMC4xNDYsNy4wNjYsMC4yMzIsMTAuNzg4LDAuMjc2ICBjMi4xMDIsMC4wMzQsNC4xODgsMC4xNjMsNi4zMDcsMC4xNjNjOC43NzEsMCwxNy40MzktMC40MzEsMjYuMDU3LTEuMDMzYzIzLjM4My0xLjQ0Nyw0My45NzYtNS40NTcsNDguNzY2LTYuNzAzICBjMTY1LjcyNS0zNC42MiwyOTAuNTkyLTE4MS44MzcsMjkwLjU5Mi0zNTcuNjg2Qzc2NS40MTgsMTk4LjUwNyw2MDEuNDg2LDM0LjU4LDQwMC4wMDQsMzQuNTh6IE0yMzYuNzQ0LDU5OS4wMjNsLTI4LjQ4NSwxNi44ODggIGwtMTUuNjMsOS4yNzJsLTQuMzA4LTQuMTJsOC40NjEtMTUuODg5bDE1LjUwOS0yOS4xMjFsMTE2LjkwNS0yMTkuNTY4bDMxLjQ2NywzMC4wNjNsLTE5LjA3NywxOS45ODkgIGMtMTEuMjg4LDExLjgwNi0xNC4yODUsMjcuNTcyLTguMDQ3LDQyLjIwM2M2LjY1MiwxNS41MjUsMjIuMDA2LDI1Ljk1MSwzOC4yMzgsMjUuOTUxYzEwLjQ0MywwLDIwLjQyLTQuNDQ1LDI4LjEwNi0xMi40OTMgIGwxOS4wNzYtMTkuOTczbDMxLjQ4NCwzMC4wMzZMMjM2Ljc0NCw1OTkuMDIzeiBNMzY0LjMxNiw0MjguMjMzbDI5LjkxNi0zMS4zNDdjMC4wODYtMC4wODYsMC4xMzgtMC4xODksMC4yMjQtMC4yNzUgIGMwLjA2OS0wLjA2OCwwLjE1NS0wLjEyLDAuMjA3LTAuMTg5bDM1LjQ2NS0zNy4xMTljMi42MzctMi43NzQsNC43MDUtMi43NzQsNS4zNzctMi43NzRjMy41MzEsMCw3LjcxOSwzLjEwMiw5LjM1NSw2Ljg5MyAgYzEuMjc1LDIuOTk5LDAuNzI1LDUuNDI4LTEuODc3LDguMTUxbC0zNS40NDcsMzcuMTM2Yy0wLjA4NywwLjA3Ny0wLjEzOSwwLjE3Mi0wLjIwNywwLjI1OGMtMC4wODYsMC4wODctMC4xNzIsMC4xMjEtMC4yNDIsMC4yMDcgIGwtMjkuOTE1LDMxLjMyOWMtMi42NTQsMi43NzQtNC43MDQsMi43NzQtNS4zOTUsMi43NzRjLTMuNTMyLDAtNy43MTktMy4xMDItOS4zNC02Ljg5MyAgQzM2MS4xNDUsNDMzLjM4NiwzNjEuNzEzLDQzMC45NTUsMzY0LjMxNiw0MjguMjMzeiBNNDQxLjEwNCw0MTkuMDQ5bDI0LjYwNy0yNS43NzljMTEuMjcxLTExLjgyMiwxNC4yODctMjcuNTksOC4wMzEtNDIuMjA0ICBjLTYuNjM1LTE1LjUyNi0yMi4wMDYtMjUuOTUyLTM4LjIzOC0yNS45NTJjLTEwLjQyOCwwLTIwLjQwNCw0LjQyOS0yOC4xMDcsMTIuNDg1bC0yNC42MDgsMjUuNzcxbC0zMS40NjYtMzAuMDUzTDU3MC4xNTYsMjAzLjUgIGwyOC4zMTQtMTYuNzkzbDEwLjY2Ni02LjMyNGw0LjMwOSw0LjEyN2wtNS44NzcsMTEuMDIxbC0xNS41NDMsMjkuMTkxTDQ3Mi41Nyw0NDkuMDg1TDQ0MS4xMDQsNDE5LjA0OXogTTQ3Ni4xMzcsNzQuMzA5ICBjNTMuMjQ4LDEyLjQ0NiwxMDEuNjAyLDM3LjY3OSwxNDEuNzM2LDcyLjIwNWMtNC41ODItMi4wODUtMTAuMDEyLTEuOTA1LTE0LjUyNywwLjc3NWwtMzAuNTE4LDE4LjExMWwtNS45MSwzLjQ5OCAgYy0zMS42NTYtMjIuOTE4LTY4LjIwNy0zOS4zNjctMTA3LjcyMS00Ny43NTlMNDc2LjEzNyw3NC4zMDl6IE00MDAuMDM4LDY1Ljg5OWMxNy4xMywwLDMzLjQ0OCwxLjUzOSw0NS4yMTgsMy4wMmwtMTcuMTI5LDQ3LjMyOSAgbC0xMC44NTcsMjkuOTk4bC0xNi4zMzYsNDUuMTY3bC0xNy42MjgtNDUuMjAxbC0xMS43MTgtMzAuMDcybC0xNy42MjgtNDUuMjEyQzM2Ni40MDEsNjcuNjE5LDM4Mi4wMzEsNjUuODk5LDQwMC4wMzgsNjUuODk5eiAgIE0zODcuMDk3LDI0MC45MTJjMi4zMSw1LjkzMyw4LjAxMyw5LjgzMSwxNC4zNzIsOS44MzFjMC4wNjksMCwwLjEzOSwwLDAuMTg5LDBjNi40NDUtMC4wNzcsMTIuMTUtNC4xNCwxNC4zMzgtMTAuMTg4ICBsMzIuNjA0LTkwLjExMmMzMi4yNiw2LjI4LDYyLjM2MywxOC41NzYsODkuMDU5LDM1LjgxN0wzMTcuNDk1LDMxNi44NDNjLTEuMzYxLDAuODEtMi40OCwxLjg0NC0zLjUxNiwyLjk2NCAgYy0wLjYyLDAuNjItMS4xNTQsMS4yOTItMS42NzEsMi4wMTZsMCwwYy0wLjM3OSwwLjUzNC0wLjc5MiwxLjAzNC0xLjEwMywxLjYyTDE5Mi4zNTMsNTQ2LjYzNyAgYy0yMC42NzktMjkuMjA4LTM1LjI1Ny02Mi45NjctNDIuMTY3LTk5LjQzMWg0MS4wNDhjOC41MywwLDE1LjQ0LTYuOTEsMTUuNDQtMTUuNDM5di02MS43NjJjMC04LjUyMS02LjkxMS0xNS40NC0xNS40NC0xNS40NCAgaC00MS41NjVjMTguNjQ1LTEwMi45NjgsOTkuNS0xODQuNTMsMjAyLjA4NS0yMDQuMzEyTDM4Ny4wOTcsMjQwLjkxMnogTTE1Ni42NjQsNDE2LjMyNXYtMzAuODhoMTkuMTI4djMwLjg4SDE1Ni42NjR6ICAgTTY1LjQ2MiwzOTkuOTk4YzAtMTU3LjcwNywxMDkuNzI4LTI5MC4xODIsMjU2LjgyMy0zMjUuMzI4bDE4LjA3OCw0Ni4zNjljLTEyOC43NjEsMjcuNTAyLTIyNS42NDIsMTQyLjExMS0yMjUuNjQyLDI3OC45NTggIGMwLDY2LjcxNSwyMy4wOTIsMTI4LjA5OCw2MS42MDYsMTc2LjcyOGwtMS44OTUsMy41NjZsLTE5LjQzOCwzNi41MzRjLTEuNDgxLDIuNzU2LTEuOTEyLDUuODA3LTEuNjU0LDguNzcxICBDOTguODI1LDU2Ni4wOTMsNjUuNDYyLDQ4Ni44OTMsNjUuNDYyLDM5OS45OTh6IE0zMjIuNzg2LDcyNS40NDFjLTQ5LjE2NS0xMS42NjYtOTQuMTQxLTM0LjI1OS0xMzIuMjc2LTY0Ljk2NyAgYzIuNzIyLTAuMDE3LDUuNDQ1LTAuNzI0LDcuOTEtMi4xODhsMzYuMjU2LTIxLjUwN2wzLjUxNi0yLjA4NWMzMC40ODUsMjEuMDc1LDY1LjI3NiwzNi4yNzMsMTAyLjcyMyw0NC4yMThMMzIyLjc4Niw3MjUuNDQxeiAgIE00MjcuNTQxLDczMy4zMTZjLTkuMzIyLDAuNjM4LTE5LjU1OSwxLjEyLTMwLjAwMSwxLjEyYy0wLjg5NywwLTEuNzA3LTAuMDE4LTIuNTg1LTAuMDM0Yy0zLjk0Ni0wLjA1Mi03LjkxLTAuMTA0LTExLjgyMi0wLjI5MyAgYy0wLjM0NS0wLjAxOC0wLjY1NS0wLjA0My0wLjk4Mi0wLjA2MWMtMy44MDktMC4xOTgtNy41ODMtMC41NDItMTEuMzU2LTAuODdjLTYuODc1LTAuNzE2LTEyLjQyNS0xLjY3Mi0xNi44MTktMi43MjNsMTguMTk4LTQ2LjY4MyAgbDExLjY2Ni0yOS45NWwxNy4wOTQtNDMuODQ4bDE1Ljg1NSw0My44MDRsMTAuODkxLDMwLjEzMmwxNy4xOTcsNDcuNTI2QzQzOS4xMzksNzMyLjIxMyw0MzMuMzY1LDczMi44MzUsNDI3LjU0MSw3MzMuMzE2eiAgIE00MTUuOTk2LDU2MC44MzdjLTIuMTg4LTYuMDQ5LTcuODkzLTEwLjExNS0xNC4zMzgtMTAuMTg0Yy02LjI3Mi0wLjE4My0xMi4yMzQsMy44MjQtMTQuNTYyLDkuODIybC0zNC44MDksODkuMjggIGMtMzAuNDE2LTUuODE1LTU4Ljk1My0xNi45NzQtODQuNTI1LTMyLjYwM2wyMTYuNTI3LTEyOC40MzVjMS4zNDQtMC43OTMsMi40OC0xLjgyNiwzLjQ5Ni0yLjk0NiAgYzEuMDg2LTEuMDg1LDIuMDY4LTIuMjU4LDIuNzkzLTMuNjM2bDExOS43NDgtMjI0LjkxNGMxOS41OTQsMjguNzkxLDMzLjM3OSw2MS44LDM5Ljg0Miw5Ny4zNDJoLTM4LjY3ICBjLTguNTMxLDAtMTUuNDM5LDYuOTE5LTE1LjQzOSwxNS40NHY2MS43NjJjMCw4LjUyOSw2LjkwOCwxNS40MzksMTUuNDM5LDE1LjQzOWgzOC40OCAgYy0xOS4yNjYsMTAyLjE1NC05OS43NzUsMTgyLjkxMy0yMDEuODExLDIwMi41NUw0MTUuOTk2LDU2MC44Mzd6IE02NDYuMDY2LDM4NS40NDV2MzAuODhoLTE5LjEyOXYtMzAuODhINjQ2LjA2NnogTTQ3NS42NzIsNzI1LjgwNCAgbC0xNi44NzEtNDYuNjQ5YzEyOS4xOTEtMjcuMTc1LDIyNi40ODYtMTQyLjAxMywyMjYuNDg2LTI3OS4xNTZjMC02NS4wNzktMjIuMDA2LTEyNS4wNTItNTguODE0LTE3My4xMDRsMy4yNC02LjA4M2wxNy4wNjEtMzIuMDYyICBjMi4zNDItNC40MDcsMi4zMDktOS41MTIsMC4zMjYtMTMuODYzYzU0LjI0OCw1OS40Niw4Ny40MzgsMTM4LjQ1OCw4Ny40MzgsMjI1LjExMSAgQzczNC41MzcsNTU4LjQyNCw2MjMuODAxLDY5MS4zOTEsNDc1LjY3Miw3MjUuODA0eiIgZmlsbD0iIzRENEQ0RCIvPjwvc3ZnPg==',
		'supports'         => array('title', 'editor'),
		'has_archive'      => false,
		'rewrite'          => $rewrite,
		'delete_with_user' => false
	);
	
	register_post_type('f4res_resource', $settings);
}

add_action('init', 'f4res_cpt_resource_register');
