<?php
 /**
 * Enqueue scripts and styles.
 */
function flight_booking_scripts() {
	
	// Styles

	wp_enqueue_style('dashicons' );

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/css/bootstrap.css');

	wp_enqueue_style('owl-carousel',get_template_directory_uri().'/css/owl.carousel.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('flight-booking-widget',get_template_directory_uri().'/css/widget.css');
	
	wp_enqueue_style('flight-booking-color-default',get_template_directory_uri().'/css/colors/default.css');
	
	wp_enqueue_style('flight-booking-wp-test',get_template_directory_uri().'/css/wp-test.css');
	
	wp_enqueue_style('flight-booking-menu',get_template_directory_uri().'/css/menu.css');
	
	wp_enqueue_style('flight-booking-style', get_stylesheet_uri() );

	wp_style_add_data('flight-booking-style', 'rtl', 'replace');
	
	wp_enqueue_style('flight-booking-gutenberg',get_template_directory_uri().'/css/gutenberg.css');
	
	wp_enqueue_style('flight-booking-responsive',get_template_directory_uri().'/css/responsive.css');
	
	// Scripts
	wp_enqueue_script('jquery-ui-core');
	
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true); 

	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), true); 
	
	wp_register_script('flight-booking-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), false, true);

	wp_localize_script('flight-booking-custom-js', 'flight_booking_script_args',
		array( 
			'scroll_top_type' => get_theme_mod( 'flight_booking_scroll_to_top_type' ) == 'simple-scroll' ? 'simple-scroll' : 'advanced-scroll'
		)
	);
	wp_enqueue_script('flight-booking-custom-js');

	wp_enqueue_script('flight-booking-navigation-focus', get_template_directory_uri() . '/js/navigation-focus.js', array(), true );

	wp_enqueue_script('skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( get_theme_mod( 'flight_booking_animation_enabled', true ) ) {
		wp_enqueue_script(
			'flight-booking-wow-script',
			get_template_directory_uri() . '/js/wow.js',
			array( 'jquery' ),
			'1.0',
			true
		);

		wp_enqueue_style(
			'flight-booking-animate',
			get_template_directory_uri() . '/css/animate.css',
			array(),
			'4.1.1'
		);
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	require get_template_directory(). '/inc/common-inline.php';

	wp_add_inline_style( 'flight-booking-style',$flight_booking_common_inline_css );
}
add_action( 'wp_enqueue_scripts', 'flight_booking_scripts' );

//Admin Enqueue for Admin
function flight_booking_admin_enqueue_scripts(){
	
	wp_enqueue_style('flight-booking-style-customizer',get_template_directory_uri(). '/css/style-customizer.css');

	wp_enqueue_style( 'flight-booking-admin-style', get_template_directory_uri().'/inc/started/main.css' );

	wp_enqueue_script( 'flight-booking-admin-script', get_template_directory_uri() . '/inc/admin-notice/admin.js', array( 'jquery' ), '', true );

}
add_action( 'admin_enqueue_scripts', 'flight_booking_admin_enqueue_scripts' );

?>