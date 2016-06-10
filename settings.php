<?php
/*
**************************************************************************

Plugin Name:  Sandbox Settings
Version:      201606.1
Description:  Testing plugins in sandbox
Author:       Kevin Pichette
Author URI:   http://kevinpichette.com/
License:      GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

*/

function sb_admin()
{
	remove_meta_box('dashboard_primary', 'dashboard', 'side'); // removes wordpress news widget on dashboard

}
add_action('wp_dashboard_setup','sb_admin');

// -----------------------------------------------------

function sb_topbar_admin()
{
	global $wp_admin_bar;
	$args = array(
			'id' 	=> 'googe_analytics',
			'title' => 'Google Analytics',
			'href' 	=> 'https://analytics.google.com',
		);
	$wp_admin_bar->add_menu( $args );
}
add_action('admin_bar_menu', 'sb_topbar_admin');

/*
	***********************
		Admin Area
	***********************
*/
function sb_add_admin_page()
{
	// generate admin page
	add_menu_page( 'Sandbox Options', 'Options', 'manage_options', 'options', 'sb_theme_create_page', 'dashicons-welcome-view-site', 0 );

	// generte subpages
	add_submenu_page( 'options', 'Sandbox Options', 'General Options', 'manage_options', 'options', 'sb_theme_create_page' );
	add_submenu_page( 'options', 'Sandbox Settings', 'Settings', 'manage_options', 'options_settings', 'sb_theme_settings_page' );

}
add_action( 'admin_menu', 'sb_add_admin_page' );

function sb_theme_create_page()
{
	// generation of admin page
	include 'inc/options.php';
}

function sb_theme_settings_page()
{
	// generation of admin page
	echo "<h1>Hello Sub</h1>";
}


?>