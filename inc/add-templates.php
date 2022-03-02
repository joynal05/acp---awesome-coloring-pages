<?php

// function tourfic_single_page_template( $single_template ) {

//     $theme_files = array( 'single-ac-page.php', 'page-templates/single-ac-page.php' );
//     $exists_in_theme = locate_template( $theme_files, false );
   
//     if ( $exists_in_theme != '' ) {
//         $single_template = $exists_in_theme;
//     } else {
//         $single_template = dirname( __FILE__ ) . "/page-templates/single-ac-page.php";
//     }
    
//     return $single_template;
// }
// add_filter( 'single_template', 'tourfic_single_page_template' );



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