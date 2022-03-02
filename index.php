<?php
/**
 * Plugin Name: Awesome Coloring Pages
 * Plugin URI:        
 * Description:       
 * Version:           1.0.0     
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       coloring-pages
 */

// enqueue style  
function coloring_page_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'cp-style',  $plugin_url . "/assets/css/cp-style.css");
}
add_action( 'wp_enqueue_scripts', 'coloring_page_scripts' );


function aw_include_script() {  
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }  
    wp_enqueue_script( 'awscript', plugin_dir_url( __FILE__ ) . 'assets/js/ac-admin.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'aw_include_script' );


// Elementor widgets 
require_once 'elementor-widgets/widgets-map.php';


// Custom post type 
require_once 'inc/cpt.php';


// Custom texonomy image fields
require_once 'inc/tex-image-field.php';


// add archive tempates
function ac_archive_page_template( $taxonomy_template ) {
    $theme_files = array( 'archive-pages.php', 'page-templates/archive-pages.php' );
    $exists_in_theme = locate_template( $theme_files, false );   
    if ( $exists_in_theme != '' ) {
        $taxonomy_template = $exists_in_theme;
    } else {
        $taxonomy_template = dirname( __FILE__ ) . "/page-templates/archive-pages.php";
    }    
    return $taxonomy_template;
}
add_filter( 'taxonomy_template', 'ac_archive_page_template' );


// add single tempate for CPT
function tourfic_single_page_template( $single_template ) {

    $theme_files = array( 'single-ac-page.php', 'page-templates/single-ac-page.php' );
    $exists_in_theme = locate_template( $theme_files, false );
   
    if ( $exists_in_theme != '' ) {
        $single_template = $exists_in_theme;
    } else {
        $single_template = dirname( __FILE__ ) . "/page-templates/single-ac-page.php";
    }
    
    return $single_template;
}
add_filter( 'single_template', 'tourfic_single_page_template' );



