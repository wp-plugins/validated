<?php
/*
Plugin Name: Validated
Plugin URI: http://www.collinsinternet.net/validated/
Description: W3C Validation
Version: 1.0.2
Author: Allan Collins
Author URI: http://www.allancollins.net/
*/
/*
Copyright (C) 2009 Collins Internet / Allan Collins

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Hook for adding admin menus
add_action('admin_menu', 'validated_pages');

// action function for above hook
function validated_pages() {
add_management_page('Validation', 'Validation', 7, 'validation', 'validated_options');
}


function validated_options() {

include "toptions.php";

}

?>