<?php
/**
 * Child theme functions and definitions
 */

/*-----------------------------------------------------------------------------------*/
/* Include the parent theme style.css
/*-----------------------------------------------------------------------------------*/

// remove fonts css parent theme
/*function photoline_child_remove_parent_styles() {
	wp_dequeue_style( 'photoline-fonts' );
}
add_action( 'wp_enqueue_scripts', 'photoline_child_remove_parent_styles', 11 );

function photoline_child_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'photoline-child-fonts', photoline_child_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'photoline_child_enqueue_styles' );*/

/**
 * Register Google fonts for Theme
 */
//if ( ! function_exists( 'photoline_child_fonts_url' ) ) :
//function photoline_child_fonts_url() {
    //$fonts_url = '';

    //$lora = _x( 'on', 'Lora font: on or off', 'photoline_child' ); // Lora font replace your

    //if ( 'off' !== $lora ) { // $lora replace your
       // $font_families = array();

        //if ( 'off' !== $lora ) {
           // $font_families[] = 'Lora:400,700,400italic'; // Lora font replace your
       // }

       // $query_args = array(
           // 'family' => urlencode( implode( '|', $font_families ) ),
            //'subset' => urlencode( 'latin' ),
        //);

       // $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    //}

    //return $fonts_url;
//}
//endif;