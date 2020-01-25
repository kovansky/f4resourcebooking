<?php
/**
 * Copyright (c) 2020. File is part of F4 Resource Booking WordPress plugin developed by F4 Developer (Stanisław
 * Kowański - https://www.f4dev.me) for Hufiec ZHP Piaseczno (http://piaseczno.zhp.pl). F4 Resource Booking project and
 * all it's files are released under GNU GPLv3 license. For more details look for LICENSE file.
 */

/**
 * Callback for [f4res_form] shortcode
 *
 * @param array $atts    Shortcode attributes
 * @param null  $content Shortcode inner content
 */
function f4res_shortcode_form_callback($atts = [], $content = null) {
	// Res. type
	// Res
	// Duration
	// Date and time
	// Personal information
	?>
	<form action="<?php the_permalink() ?>" id="booking" method="post" autocomplete="on">
		<ul class="progressbar">
			<li class="active"><?php __('Resource type', 'f4resbook') ?></li>
			<li><?php __('Resource', 'f4resbook') ?></li>
			<li><?php __('Date and time', 'f4resbook') ?></li>
			<li><?php __('Personal information', 'f4resbook') ?></li>
		</ul>
		
		<fieldset>
			<h3 class="fs-title"><?php __('Resource type', 'f4resbook') ?></h3>
			<h4 class="fs-subtitle"><?php __('Choose the category of what do you want to book', 'f4resbook') ?></h4>
			<!-- ToDo: Resource types list -->
		</fieldset>
		
		<fieldset>
			<h3 class="fs-title"><?php __('Resource', 'f4resbook') ?></h3>
			<h4 class="fs-subtitle"><?php __('Choose the resource you want to book', 'f4resbook') ?></h4>
			<!-- ToDo: Resources list -->
		</fieldset>
		
		<fieldset>
			<h3 class="fs-title"><?php __('Date and time', 'f4resbook') ?></h3>
			<h4 class="fs-subtitle"><?php __('Choose the date and time when you want to book', 'f4resbook') ?></h4>
			<!-- ToDo: Date & time chooser (calendar) -->
			<!-- ToDo: Duration input -->
		</fieldset>
		
		<fieldset>
			<h3 class="fs-title"><?php __('Personal information', 'f4resbook') ?></h3>
			<h4 class="fs-subtitle"><?php __('Provide your personal information', 'f4resbook') ?></h4>
			<!-- ToDo: Personal information input -->
		</fieldset>
	</form>
	<?php
}
