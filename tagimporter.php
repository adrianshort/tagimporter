<?php
/*
Plugin Name: Tag Importer
Plugin URI: 
Description: Import terms (tags) into a non-hierarchical taxonomy
Version: 0.2
Author: Adrian Short
Author URI: https://adrianshort.org/
License: CC0/public domain
*/

add_action( 'admin_menu', 'as_tagimporter_menu' );

// Add submenu to Tools menu
function as_tagimporter_menu() {
  add_submenu_page(
    'tools.php', // top-level handle
    'Tag Importer', // page title 
    'Tag Importer', // submenu title
    'manage_options', // capabilities
    'as_tagimporter', // submenu handle
    'as_tagimporter_page' //function
  );
}

function as_tagimporter_page() {
  if ( ! current_user_can( 'manage_options' ) ) {
    wp_die("You do not have sufficient permissions to access this page.");
  }
  
  require_once ( dirname( __FILE__ ) . '/settings.php' );
}