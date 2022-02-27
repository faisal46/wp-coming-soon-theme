<?php
/*
* Theme version check
*/
if ( site_url() == 'http://localhost/theme_dev4' ) {
    define( 'VERSION', time() );
  }else{
    define( 'VERSION', wp_get_theme()->get( 'Version' ) );
  }

/*
* After Setup Theme Supports
*/
function coming_soon_after_setup_theme() {
    load_theme_textdomain( 'coming-soon' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'coming_soon_after_setup_theme' );

/** 
* Assets management
*/
function coming_soon_assets() {

  if ( is_page() ) {
    $coming_soon_template = basename( get_page_template() );
    if ( $coming_soon_template == 'coming-soon.php' ) {
      wp_enqueue_style( 'animate-css', get_theme_file_uri().'/assets/css/animate.css' );
      wp_enqueue_style( 'icomoon-css', get_theme_file_uri().'/assets/css/icomoon.css' );
      wp_enqueue_style( 'bootstrap-css', get_theme_file_uri().'/assets/css/bootstrap.css' );
      wp_enqueue_style( 'style-css', get_theme_file_uri().'/assets/css/style.css' );
      wp_enqueue_style( 'coming', get_stylesheet_uri(), null, VERSION );
  
      wp_enqueue_script( 'easing-jquery-js', get_theme_file_uri().'/assets/js/jquery.easing.1.3.js', array('jquery'), null, true );
      wp_enqueue_script( 'bootstrap-jquery-js', get_theme_file_uri().'/assets/js/bootstrap.min.js', array('jquery'), null, true );
      wp_enqueue_script( 'jquery.waypoints-jquery-js', get_theme_file_uri().'/assets/js/jquery.waypoints.min.js', array('jquery'), null, true );
      wp_enqueue_script( 'simplyCountdown-jquery-js', get_theme_file_uri().'/assets/js/simplyCountdown.js', array('jquery'), null, true );
      wp_enqueue_script( 'main-jquery-js', get_theme_file_uri().'/assets/js/main.js', array('jquery'), VERSION, true );
  
      /* Custom field release meta field data */
      $release_year  = get_post_meta( get_the_ID(), 'release_year', true );
      $release_month = get_post_meta( get_the_ID(), 'release_month', true );
      $release_day   = get_post_meta( get_the_ID(), 'release_day', true );
  
      wp_localize_script( 'main-jquery-js', 'release_data', array(
        'release_year' => $release_year,
        'release_month' => $release_month,
        'release_day' => $release_day,
       ) );
    } else {
      wp_enqueue_style( 'bootstrap-css', get_theme_file_uri().'/assets/css/bootstrap.css' );
      wp_enqueue_style( 'comming', get_stylesheet_uri(), null, VERSION );
    }
  }
   
  }
add_action( 'wp_enqueue_scripts', 'coming_soon_assets' );

/** 
* Sidebar registration
*/
function coming_soon_sidebar_register() {
    register_sidebar(
        array(
          'name'           => sprintf( __( 'Footer Left', 'coming-soon' ) ),
          'id'             => "footer-left",
          'description'    => sprintf( __( 'Footer left sidebar', 'coming-soon' ) ),
          'before_widget'  => '<section id="%1$s" class="widget %2$s">',
          'after_widget'   => "</section>\n",
          'before_title'   => '<h2 class="widgettitle">',
          'after_title'    => "</h2>\n",
        )
    );
    
    register_sidebar(
        array(
          'name'           => sprintf( __( 'Footer Right', 'coming-soon' ) ),
          'id'             => "footer-right",
          'description'    => sprintf( __( 'Footer right sidebar', 'coming-soon' ) ),
          'before_widget'  => '<section id="%1$s" class="text-right widget %2$s">',
          'after_widget'   => "</section>\n",
          'before_title'   => '<h2 class="widgettitle">',
          'after_title'    => "</h2>\n",
        )
    );
}
add_action( 'widgets_init', 'coming_soon_sidebar_register' );

/**
 * Page template banner
 */
function coming_soon_page_template_banner(){

  if ( is_page() ) {
    $feature_image = get_the_post_thumbnail_url( null, 'large' );
    ?>
    <style>
      .home-banner {
        background-image: url(<?php echo $feature_image; ?>);
      }
    </style>
    <?php
  }

}
add_action( 'wp_head', 'coming_soon_page_template_banner' );

