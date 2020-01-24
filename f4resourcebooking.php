<?php
/**
 * Copyright (c) 2020. File is part of F4 Resource Booking WordPress plugin developed by F4 Developer (Stanisław Kowański - https://www.f4dev.me)
 * for Hufiec ZHP Piaseczno (http://piaseczno.zhp.pl). F4 Resource Booking project and all it's files are released under GNU GPLv3 license.
 * For more details look for LICENSE file.
 */

/*
Plugin Name: F4 Resource Booking
Plugin URI: https://www.f4dev.me
Description: Plugin that lets to book company resources. Integrates with O365.
Version: 1.0.0
Author: F4 Developer (Stanisław Kowański
Author URI: https://www.f4dev.me
License: GNU GPLv3
Text Domain: f4resbook

F4 Resource Booking is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

F4 Resource Booking is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with F4 Resource Booking. If not, see https://www.gnu.org/licenses/gpl-3.0.html.
*/

function f4res_activate() {

}

function f4res_deactivate() {

}

register_activation_hook(__FILE__, 'f4res_activate');
register_deactivation_hook(__FILE__, 'f4res_deactivate');