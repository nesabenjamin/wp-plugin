<?php

/**
 * Plugin Name:       Manna CRUD Plugin
 */
 
global $jal_db_version;
$jal_db_version = '1.0';

function manna_install() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'daily_manna';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		title tinytext NOT NULL,
		manna text NOT NULL,
		date date NOT NULL,		
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'manna_install' );
//adding in menu
add_action('admin_menu', 'side_menu');

function side_menu() {
    //adding plugin in menu
    add_menu_page(
        'daily_manna', //page title
        'Daily manna', //menu title
        'manage_options', //capabilities
        'Daily_Manna', //menu slug
        'manna_list' //function
    );
    //adding submenu to a menu
    add_submenu_page('Daily_Manna',//parent page slug
        'manna_insert',//page title
        'Manna Insert Side Menu',//menu titel
        'manage_options',//manage optios
        'manna_insert',//slug
        'manna_insert'//function
    );
    add_submenu_page( null,//parent page slug
        'manna_update',//$page_title
        'Manna Update',// $menu_title
        'manage_options',// $capability
        'Manna_Update',// $menu_slug,
        'manna_update'// $function
    );
    add_submenu_page( null,//parent page slug
        'manna_delete',//$page_title
        'Manna Delete',// $menu_title
        'manage_options',// $capability
        'Manna_Delete',// $menu_slug,
        'manna_delete'// $function
    );
}

//echo 'here';
// returns the root directory path of particular plugin
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'manna_list.php');
require_once (ROOTDIR.'manna_insert.php');
require_once (ROOTDIR.'manna_update.php');
require_once (ROOTDIR.'manna_delete.php');
?>