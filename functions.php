<?php
/**
 * crucialip functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package crucialip
 */

if ( ! function_exists( 'crucialip_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function crucialip_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on crucialip, use a find and replace
	 * to change 'crucialip' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'crucialip', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'crucialip' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'crucialip_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'crucialip_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function crucialip_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'crucialip_content_width', 640 );
}
add_action( 'after_setup_theme', 'crucialip_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function crucialip_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'crucialip' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'crucialip_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function crucialip_scripts() {
	wp_enqueue_style( 'crucialip-style', get_stylesheet_uri() );
  wp_deregister_script( 'jquery' );
  $jquery_cdn = '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js';
  wp_enqueue_script( 'jquery', $jquery_cdn, array(), '20130115', true );

	wp_enqueue_script( 'crucialip-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'crucialip-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
  
  wp_enqueue_script( 'custom_js', get_template_directory_uri() .'/js/custom.js', array(), '20160108',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'crucialip_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function get_product_short( $atts ){
  $args = array( 'post_type' => 'product', 'posts_per_page' => -1 );
  $loop = new WP_Query( $args );
  
  $output = array();
  
  while ( $loop->have_posts() ) : $loop->the_post();
   $key = 'oid_'.get_cfc_field('modeltitle','orderid');
  
   $a = "";
   $a .= '<div class="product-list-single" id="'.$key.'">';

   $a .= '<div class="product-pdf">';
   $img = get_cfc_field('modeltitle','pdf-product-brief');
   $pdf = $img->guid;
   if ($pdf!=''){
    $a .= '<a href="'.$pdf.'" target="_blank"><img class="download" src="'.get_template_directory_uri().'/img/icon_pdf.png"></a>'; 
   }else{
    $a .= '<a href="'.get_page_link(13).'" class="nopdf"><img class="conme" src="'.get_template_directory_uri().'/img/icon_env.png"></a>'; 
   }
	 $a .= '</div>';
  
   $key2 = 'id_'.get_the_ID();
   $a .= '<a href="#'.$key2.'" class="linkds">';
	 $a .= '<div class="product-id">';
   $a .= get_cfc_field('modeltitle','model-id');
   
	 $a .= '</div>';
   $a .= '<div class="product-title">';
   $a .= get_cfc_field('modeltitle','model-name');
	 $a .= '</div>';
   $a .= '</a>';
     
   $a .= '</div>';
  
   
  
   if (array_key_exists($key, $output)){
    $output[$key] .= $a;
   }else{
     $output[$key] = $a;
   }
  endwhile;
  
  ksort($output);
  $serializedout = "";
  foreach ($output as $key => $val){
    $serializedout .= $val;
  }
  return $serializedout;
}

function get_product_long( $atts ){
  $args = array( 'post_type' => 'product', 'posts_per_page' => -1 );
  $loop = new WP_Query( $args );
  $output = array();
  
  while ( $loop->have_posts() ) : $loop->the_post();
  $key = 'oid_'.get_cfc_field('modeltitle','orderid');
  $key2 = 'id_'.get_the_ID();
   $a = "";
   $a .= '<a class="anchor" id="'.$key2.'"></a>';
   $a .= '<div class="product-full-single" id="'.$key.'">';
  
   $a .= '<div class="product-row">';
   $a .= '<div class="product-id">';
   $a .= get_cfc_field('modeltitle','model-id');
	 $a .= '</div>';
  
   $a .= '<div class="product-title">';
   $a .= get_cfc_field('modeltitle','model-name');
	 $a .= '</div>';
   $a .= '</div>';
  
   $a .= '<div class="product-desc">';
   $a .= get_cfc_field('modeltitle','product-description');
	 $a .= '</div>';
  
   $a .= '<div class="product-row">';
   
  
  $img = get_cfc_field('modeltitle','pdf-product-brief');
   $pdf = $img->guid;
  if ($pdf==''){
    $a.= '<a href="'.get_page_link(13).'" target="_blank" class="prodbrief"><img class="conme" src="'.get_template_directory_uri().'/img/icon_env.png">COMING SOON. PLEASE CONTACT US FOR MORE INFORMATION.</a>';
  }else{
    $a.= '<a href="'.$pdf.'" target="_blank" class="prodbrief"><img class="download" src="'.get_template_directory_uri().'/img/icon_pdf.png">DOWNLOAD THE PRODUCT BRIEF</a>';
  }
   //$a .= $img['url'];
	 $a .= '<a href="#top" class="atop"><img class="icontop" src="'.get_template_directory_uri().'/img/icon_top.png">BACK TO TOP</a>';
	
   $a .= '</div>';
   $a .= '</div>';
   if (array_key_exists($key, $output)){
    $output[$key] .= $a;
   }else{
     $output[$key] = $a;
   }
  endwhile;
  ksort($output);
  $serializedout = "";
  foreach ($output as $key => $val){
    $serializedout .= $val;
  }
  return $serializedout;
}

add_shortcode( 'getproducts', 'get_product_short' );
add_shortcode( 'getproductslong', 'get_product_long' );
