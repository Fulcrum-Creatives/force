<?php
/*---------------------------------------------------------
 * Constants
---------------------------------------------------------*/
$wp_theme = wp_get_theme();
// Theme Version
if ( ! defined( 'FCWP_VERSION' ) ) {
	define( 'FCWP_VERSION', $wp_theme->get( 'Version' ) );
}
// Theme Taxdomain
if ( !defined( 'FCWP_TEXTDOMAIN' ) ) {
  define( 'FCWP_TEXTDOMAIN', $wp_theme->get( 'TextDomain' ) );
}
// Theme Prefix
if ( ! defined( 'FCWP_PREFIX' ) ) {
	define( 'FCWP_PREFIX', FCWP_TEXTDOMAIN );
}
// Theme Name
if ( !defined( 'FCWP_NAME' ) ) {
  define( 'FCWP_NAME', $wp_theme->get( 'Name' ) );
}
// Theme URI
if ( !defined( 'FCWP_URI' ) ) {
  define( 'FCWP_URI', esc_url( get_template_directory_uri() ) );
}
// Theme Stylesheet URI
if ( !defined( 'FCWP_STYLESHEETURI' ) ) {
  define( 'FCWP_STYLESHEETURI', esc_url( get_stylesheet_uri() ) );
}
// Theme Directory
if ( !defined( 'FCWP_DIR' ) ) {
  define( 'FCWP_DIR', get_template_directory() );
}

/*---------------------------------------------------------
 * Theme Setup
---------------------------------------------------------*/
if( !function_exists( 'fcwp_theme_support' ) ) :
	function fcwp_theme_support() {
		// Load taxdomain
		load_theme_textdomain( FCWP_TEXTDOMAIN, get_template_directory() . '/languages' );
	    // Automatic Feed Support
	    // add_theme_support( 'automatic-feed-links' );
	    // Title Tage Support
	    add_theme_support( 'title-tag' );
	    add_image_size( 'logo', 260, 9999 );
	    add_image_size( 'logo@2', 520, 9999 );
	}
	add_action( 'after_setup_theme', 'fcwp_theme_support' );
endif;

/*---------------------------------------------------------
 * Custom Nav Walker
---------------------------------------------------------*/
if( !class_exists( 'fcwp_walker_nav_menu' ) ) :
	class fcwp_walker_nav_menu extends Walker_Nav_Menu {
		  
		// add classes to ul sub-menus
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
		    // depth dependent classes
		    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
		    $classes = array(
			        'sub-menu',
			        'menu-depth-' . $display_depth
		        );
		    $class_names = implode( ' ', $classes );
		  
		    // build html
		    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}
		  
		// add main/sub classes to li's and links
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
		  	$display_depth = ( $depth + 1);
		    // depth dependent classes
		    $depth_classes = array(
		        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
		        'menu-item-depth-' . $depth,
		        'menu-item-' . strtolower( str_replace( ' ', '-', $item->title ) )
		    );
		    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
		 
		    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		  
		    // build html
		    $output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '" role="menuitem" aria-lable="' . apply_filters( 'the_title', $item->title, $item->ID ) . '">';
		  
		    // link attributes
		    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
		  
		    
		   	$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
		  
		    // build html
		    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
endif;

/*---------------------------------------------------------
 * Load Stylesheets
---------------------------------------------------------*/
if( !function_exists( 'fcwp_load_stylesheets' ) ) :
	function fcwp_load_stylesheets() {
		// Load the main stylesheet.
		wp_enqueue_style( 'fcwp-style', FCWP_STYLESHEETURI, array(), '1.0.0', 'all' );
		// Load the Internet Explorer 7 specific stylesheet.
		wp_enqueue_style( 'fcwp-ie8-style', FCWP_URI . '/css/ie8.style.css', array( 'fcwp-style' ), '1.0.0' );
		wp_style_add_data( 'fcwp-ie8-style', 'conditional', 'IE 8' );
		// Load the Internet Explorer 7 specific stylesheet.
		wp_enqueue_style( 'fcwp-ie9-style', FCWP_URI . '/css/ie9.style.css', array( 'fcwp-style' ), '1.0.0' );
		wp_style_add_data( 'fcwp-ie9-style', 'conditional', 'IE 9' );
		$dir = get_stylesheet_directory();
		if( filesize( $dir . '/css/quickfix.css' ) != 0 ) {
       wp_enqueue_style( 'ohw-qf', FCWP_URI . '/css/quickfix.css', array(), '1.0.0', 'all' );
    }
    // Fast Fonts Tracker
    wp_enqueue_style( 'fast-fonts', 'http://fast.fonts.net/cssapi/427ebd6e-6610-482b-ae8c-73fc9085da99.css' );
	}
	add_action( 'wp_enqueue_scripts', 'fcwp_load_stylesheets' );
endif;

/*---------------------------------------------------------
 * Load JavaScript
---------------------------------------------------------*/
if( !function_exists( 'fcwp_load_child_javascript' ) ) :
	function fcwp_load_child_javascript() {
		// jQuery
	    wp_enqueue_script('jquery');
	    // scripts.min.js
	    wp_register_script( 'scripts.min.js', FCWP_URI . '/js/scripts.min.js', false, '1.0.0', true );
	    wp_enqueue_script( 'scripts.min.js' );
	    // comment reply
	    /*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}*/
	}
	add_action( 'wp_enqueue_scripts', 'fcwp_load_child_javascript' );
endif;

/*---------------------------------------------------------
 * IE Conditional JavaScript
---------------------------------------------------------*/
if( !function_exists( 'fcwp_load_ie' ) ) :
	function fcwp_load_ie() {
	  ob_start();?>
	<!--[if (lt IE 9) & (!IEMobile)]><script src="<?php echo FCWP_STYLESHEETURI; ?>/js/ie.min.js"></script><![endif]-->
	  <?php
	  echo ob_get_clean();
	}
	add_action( 'wp_head', 'fcwp_load_ie',10 );
endif;

/*---------------------------------------------------------
 * Sidebar Widget Area
---------------------------------------------------------*/
function fcwp_register_custom_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', FCWP_TEXTDOMAIN ),
        'id'            => 'sidebar',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
}
add_action( 'widgets_init', 'fcwp_register_custom_sidebars' );