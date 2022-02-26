<?php
/*
* Theme version check
*/
if ( site_url() == 'http://localhost/theme_dev4' ){
    define( 'VERSION', time() );
  }else{
    define( 'VERSION', wp_get_theme()->get( 'Version' ) );
  }

/*
* After Setup Theme bootstraping
*/
function comming_bootstraping(){
    load_theme_textdomain( 'comming' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'comming_bootstraping' );

/** 
* Assets management
*/
function comming_assets(){
    wp_enqueue_style( 'comming', get_stylesheet_uri(), null, VERSION );
    wp_enqueue_script( 'alpha-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'comming_assets' );

