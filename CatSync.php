<?php
/*
Plugin Name: CatSync
Version: 0.8.6
Author: Michael Lynch
Author URI: http://CatSync.wordpress.com/
Plugin URI: http://wordpress.org/extend/plugins/catsync/

Description: CatSync is directed towards users who need to manage a large number of blog posts created from an external database.  Users will be able to dynamically create blog posts pulling information from external tables and placing them in specified categories. They also can edit basic post meta_data to be used during the import process such as comment_status or ping_status.  In addition to creating posts, a user can remove an entire category of posts.  CatSync also supports importing from multiple tales into the same category by simply appending the new posts to the current list.  This plug-in is still under development, but please direct your comments or questions to the CatSync development team over at catsync-devs@lists.launchpad.net


<----------------------------- LICENSE  ---------------------------------->

Copyright 2009  Michael Lynch  (email : MLynch1985@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//This is the main entry point of the CatSync Application
//Do not edit this unless you know what you are doing.

add_action('admin_init', 'catsync_admin_init');
add_action('admin_menu', 'catsync_admin_menu');
    
function catsync_admin_init()
{
	wp_register_script('ajaxScript', WP_PLUGIN_URL . '/catsync/includes/Javascript/ajaxScript.js');
	wp_register_script('dualListBox', WP_PLUGIN_URL . '/catsync/includes/Javascript/dualListBox-1.0.1.min.js');
}

function catsync_admin_menu()
{
	$page = add_management_page("CatSync", "CatSync", 1, "CatSync", "catsync_manage_menu");
	add_action('admin_print_scripts-' . $page, 'catsync_admin_styles');
}

function catsync_admin_styles()
{
	wp_enqueue_script('ajaxScript');
	wp_enqueue_script('dualListBox');
}

function catsync_manage_menu()
{
	include("adminMenu.php");
}
?>
