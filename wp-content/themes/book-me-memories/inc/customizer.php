<?php
/**
 * flight-booking Theme Customizer.
 *
 * @package flight-booking
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flight_booking_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting('custom_logo')->transport = 'refresh';	
}
add_action( 'customize_register', 'flight_booking_customize_register' );

if ( ! defined( 'FLIGHT_BOOKING_BUY_NOW_1' ) ) {
define('FLIGHT_BOOKING_BUY_NOW_1',__('https://www.mishkatwp.com/themes/flight-booking-wordpress-theme/','flight-booking'));
}

if ( ! defined( 'FLIGHT_BOOKING_BUNDLE_1' ) ) {
define('FLIGHT_BOOKING_BUNDLE_1',__('https://www.mishkatwp.com/themes/wordpress-theme-bundle/','flight-booking'));
}

if ( class_exists("Kirki")){

	/* Logo */

	/* Logo Size limit Option End */
	new \Kirki\Field\Slider(
		[
			'settings'    => 'flight_booking_logo_resizer_setting',
			'label'       => esc_html__( 'Logo Size Limit', 'flight-booking' ),
			'section'     => 'title_tagline',
			'default'     => 70,
			'choices'     => [
				'min'  => 10,
				'max'  => 300,
				'step' => 10,
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_site_title_setting',
			'label'       => esc_html__( 'Site Title On / Off', 'flight-booking' ),
			'section'     => 'title_tagline',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_tagline_setting',
			'label'       => esc_html__( 'Tagline On / Off', 'flight-booking' ),
			'section'     => 'title_tagline',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'title_tagline',
    ] );

	/* Logo End */


		/* Typography Section */

	new \Kirki\Section(
		'flight_booking_theme_typography_section',
		[
			'title'       => esc_html__( 'Theme Typography', 'flight-booking' ),
			'description' => esc_html__( 'Here you can customize Heading or other body text font settings', 'flight-booking' ),
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flight_booking_all_headings_typography',
		'section'     => 'flight_booking_theme_typography_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'flight-booking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'flight_booking_all_headings_typography',
		'label'       => esc_html__( 'Heading Typography',  'flight-booking' ),
		'description' => esc_html__( 'Select the typography options for your heading.',  'flight-booking' ),
		'section'     => 'flight_booking_theme_typography_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flight_booking_body_content_typography',
		'section'     => 'flight_booking_theme_typography_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'flight-booking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'flight_booking_body_content_typography',
		'label'       => esc_html__( 'Content Typography',  'flight-booking' ),
		'description' => esc_html__( 'Select the typography options for your content.',  'flight-booking' ),
		'section'     => 'flight_booking_theme_typography_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_theme_typography_section',
    ] );

    /* End Typography */

        /* Woocommerce Section */

	new \Kirki\Section(
		'flight_booking_theme_product_sidebar',
		[
			'title'       => esc_html__( 'Woocommerce Sidebars', 'flight-booking' ),
			'description' => esc_html__( 'Here you can change woocommerce sidebar', 'flight-booking' ),
			'panel' =>'woocommerce',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'flight_booking_product_sidebar_position',
			'label'       => esc_html__( 'Sidebar Option', 'flight-booking' ),
			'section'     => 'flight_booking_theme_product_sidebar',
			'default'     => 'right',
			'choices'     => [
				'left' => esc_html__( 'Left Sidebar', 'flight-booking' ),
				'right' => esc_html__( 'Right Sidebar', 'flight-booking' ),
				'none' => esc_html__( 'No Sidebar', 'flight-booking' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_theme_product_sidebar',
    ] );

    /* Woocommerce Section End */

    /* Global Color Section */

	new \Kirki\Section(
		'flight_booking_theme_color_section',
		[
			'title'       => esc_html__( 'Theme Colors Option', 'flight-booking' ),
			'description' => esc_html__( 'Here you can change your theme color', 'flight-booking' ),
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'flight_booking_theme_color_1',
		'label'       => __( 'Select Your First Color', 'flight-booking' ),
		'section'     => 'flight_booking_theme_color_section',
		'default'     => '#ed814a',
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_theme_color_section',
    ] );

    /* Global Color End */

        /* Breadcrumb Section */

	new \Kirki\Section(
		'flight_booking_breadcrumb_section',
		[
			'title'       => esc_html__( 'Theme Breadcrumb Option', 'flight-booking' ),
			'description' => esc_html__( 'The breadcrumbs for your theme can be included here.', 'flight-booking' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_breadcrumb_setting',
			'label'       => esc_html__( 'Enable Breadcrumbs Option', 'flight-booking' ),
			'section'     => 'flight_booking_breadcrumb_section',
			'default'     => true,
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'text',
	    'settings'    => 'flight_booking_breadcrumb_separator',
	    'label'       => esc_html__( 'Breadcrumb Separator Setting', 'flight-booking' ),
	    'section'     => 'flight_booking_breadcrumb_section',
	    'default'     => ' → ',
	    'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_breadcrumb_section',
    ] );

    /* Breadcrumb section End */

		// PANEL
	Kirki::add_panel( 'flight_booking_panel_id_5', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Animations', 'flight-booking' ),
	) );

	// ANIMATION SECTION
	Kirki::add_section( 'flight_booking_section_animation', array(
	    'title'          => esc_html__( 'Animations', 'flight-booking' ),
	    'priority'       => 2,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'flight_booking_animation_enabled',
		'label'       => esc_html__( 'Turn To Show Animation', 'flight-booking' ),
		'section'     => 'flight_booking_section_animation',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'flight-booking' ),
			'off' => esc_html__( 'Disable', 'flight-booking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_section_animation',
    ] );

	//Home page Setting Panel
	new \Kirki\Panel(
		'flight_booking_home_page_section',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Home Page Sections', 'flight-booking' ),
			'priority'    => 20,
		]
	);

	/* Top Header */

	new \Kirki\Section(
		'flight_booking_top_header_section',
		[
			'title'       => esc_html__( 'Top Header', 'flight-booking' ),
			'description' => esc_html__( 'Here you can add top header text and social link.', 'flight-booking' ),
			'panel'		  => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_top_header_text',
			'label'    => esc_html__( 'Add Text', 'flight-booking' ),
			'section'  => 'flight_booking_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'flight_booking_top_twitter_link',
			'label'    => esc_html__( 'Add Twitter Link', 'flight-booking' ),
			'section'  => 'flight_booking_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'flight_booking_top_linkdin_link',
			'label'    => esc_html__( 'Add Linkdin Link', 'flight-booking' ),
			'section'  => 'flight_booking_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'flight_booking_top_youtube_link',
			'label'    => esc_html__( 'Add Youtube Link', 'flight-booking' ),
			'section'  => 'flight_booking_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'flight_booking_top_facebook_link',
			'label'    => esc_html__( 'Add Facebook Link', 'flight-booking' ),
			'section'  => 'flight_booking_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'flight_booking_top_instagram_link',
			'label'    => esc_html__( 'Add Instagram Link', 'flight-booking' ),
			'section'  => 'flight_booking_top_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_top_header_section',
    ] );

	/* Header */

	new \Kirki\Section(
		'flight_booking_header_button_section',
		[
			'title'       => esc_html__( 'Header', 'flight-booking' ),
			'description' => esc_html__( 'Here you can add header button text and link.', 'flight-booking' ),
			'panel'		  => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_header_phone_number',
			'label'    => esc_html__( 'Add Phone Number', 'flight-booking' ),
			'section'  => 'flight_booking_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_header_email_address',
			'label'    => esc_html__( 'Add Email Address', 'flight-booking' ),
			'section'  => 'flight_booking_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_header_opening_time',
			'label'    => esc_html__( 'Add Opening Time', 'flight-booking' ),
			'section'  => 'flight_booking_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_header_button_text',
			'label'    => esc_html__( 'Add Button Text', 'flight-booking' ),
			'section'  => 'flight_booking_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'flight_booking_header_button_link',
			'label'    => esc_html__( 'Add Button Link', 'flight-booking' ),
			'section'  => 'flight_booking_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_header_button_section',
    ] );

	/* Home Slider */

	new \Kirki\Section(
		'flight_booking_home_slider_section',
		[
			'title'       => esc_html__( 'Home Slider', 'flight-booking' ),
			'description' => esc_html__( 'Here you can add slider image, title and text.', 'flight-booking' ),
			'panel'		  => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_slide_on_off',
			'label'       => esc_html__( 'Slider On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_home_slider_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'flight_booking_slide_count',
			'label'    => esc_html__( 'Slider Number Control', 'flight-booking' ),
			'section'  => 'flight_booking_home_slider_section',
			'default'  => '',
			'choices'  => [
				'min'  => 0,
				'max'  => 3,
				'step' => 1,
			],
		]
	);

	$slide_count = get_theme_mod('flight_booking_slide_count');

	for ($i=1; $i <= $slide_count; $i++) { 
		
		new \Kirki\Field\Image(
			[
				'settings'    => 'flight_booking_slider_image'.$i,
				'label'       => esc_html__( 'Slider Image 0', 'flight-booking' ).$i,
				'section'     => 'flight_booking_home_slider_section',
				'default'     => '',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'flight_booking_slider_short_heading'.$i,
				'label'    => esc_html__( 'Short Heading 0', 'flight-booking' ).$i,
				'section'  => 'flight_booking_home_slider_section',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'flight_booking_slider_heading'.$i,
				'label'    => esc_html__( 'Main Heading 0', 'flight-booking' ).$i,
				'section'  => 'flight_booking_home_slider_section',
			]
		);

		new \Kirki\Field\URL(
			[
				'settings' => 'flight_booking_slider_heading_link'.$i,
				'label'    => esc_html__( 'Heading Url 0', 'flight-booking' ).$i,
				'section'  => 'flight_booking_home_slider_section',
				'default'  => '',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'flight_booking_slider_content'.$i,
				'label'    => esc_html__( 'Content Text 0', 'flight-booking' ).$i,
				'section'  => 'flight_booking_home_slider_section',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'flight_booking_slider_button1_text'.$i,
				'label'    => esc_html__( 'Button Text 0', 'flight-booking' ).$i,
				'section'  => 'flight_booking_home_slider_section',
			]
		);

		new \Kirki\Field\URL(
			[
				'settings' => 'flight_booking_slider_button1_link'.$i,
				'label'    => esc_html__( 'Button Link 0', 'flight-booking' ).$i,
				'section'  => 'flight_booking_home_slider_section',
				'default'  => '',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'flight_booking_slider_button2_text'.$i,
				'label'    => esc_html__( 'Button Text 0', 'flight-booking' ).$i,
				'section'  => 'flight_booking_home_slider_section',
			]
		);

		new \Kirki\Field\URL(
			[
				'settings' => 'flight_booking_slider_button2_link'.$i,
				'label'    => esc_html__( 'Button Link 0', 'flight-booking' ).$i,
				'section'  => 'flight_booking_home_slider_section',
				'default'  => '',
			]
		);	

	}

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_home_slider_section',
    ] );

    /* Pro About Us */

    new \Kirki\Section(
		'flight_booking_about_us_section',
		[
			'title'       => esc_html__( 'About Us Section', 'flight-booking' ),
			'panel'       => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_about_us_section',
        'description' => __( '<p>a. Add more About Us Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For About Us Section</p>', 'flight-booking' ),
    ] );

	/* Pro About Us End */

	/* Pro Our Offerings */

    new \Kirki\Section(
		'flight_booking_our_offerings_section',
		[
			'title'       => esc_html__( 'Our Offerings Section', 'flight-booking' ),
			'panel'       => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_our_offerings_section',
        'description' => __( '<p>a. Add more Our Offerings Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Our Offerings Section</p>', 'flight-booking' ),
    ] );

	/* Pro Our Offerings End */

	/* Pro Featured */

    new \Kirki\Section(
		'flight_booking_featured_section',
		[
			'title'       => esc_html__( 'Featured Section', 'flight-booking' ),
			'panel'       => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_featured_section',
        'description' => __( '<p>a. Add more Featured Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Featured Section</p>', 'flight-booking' ),
    ] );

	/* Pro Featured End */

	/* Pro Counter */

    new \Kirki\Section(
		'flight_booking_counter_section',
		[
			'title'       => esc_html__( 'Counter Section', 'flight-booking' ),
			'panel'       => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_counter_section',
        'description' => __( '<p>a. Add more Counter Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Counter Section</p>', 'flight-booking' ),
    ] );

	/* Pro Counter End */

	/* Pro Flight Booking */

    new \Kirki\Section(
		'flight_booking_booking_section',
		[
			'title'       => esc_html__( 'Flight Booking Section', 'flight-booking' ),
			'panel'       => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_booking_section',
        'description' => __( '<p>a. Add more Flight Booking Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Flight Booking Section</p>', 'flight-booking' ),
    ] );

	/* Pro Flight Booking End */

	/* Pro FAQ */

    new \Kirki\Section(
		'flight_booking_faq_section',
		[
			'title'       => esc_html__( 'FAQ Section', 'flight-booking' ),
			'panel'       => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_faq_section',
        'description' => __( '<p>a. Add more FAQ Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For FAQ Section</p>', 'flight-booking' ),
    ] );

	/* Pro FAQ End */

	/* Pro Gallery */

    new \Kirki\Section(
		'flight_booking_gallery_section',
		[
			'title'       => esc_html__( 'Gallery Section', 'flight-booking' ),
			'panel'       => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_gallery_section',
        'description' => __( '<p>a. Add more Gallery Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Gallery Section</p>', 'flight-booking' ),
    ] );

	/* Pro Gallery End */

	/* Home News Feed */

	new \Kirki\Section(
		'flight_booking_home_news_feed_section',
		[
			'title'       => esc_html__( 'Home News Feed', 'flight-booking' ),
			'description' => esc_html__( 'Here you can add news feed related text to display news feed.', 'flight-booking' ),
			'panel'		  => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_news_feed_on_off',
			'label'       => esc_html__( 'News Feed On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_home_news_feed_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_news_feed_main_heading',
			'label'    => esc_html__( 'Main Heading', 'flight-booking' ),
			'section'  => 'flight_booking_home_news_feed_section',
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'flight_booking_news_feed_category',
		'label'       => esc_html__( 'Select the category to show news feed ', 'flight-booking' ),
		'section'     => 'flight_booking_home_news_feed_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'flight-booking' ),
		'priority'    => 10,
		'choices'     => flight_booking_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_home_news_feed_section',
    ] );

    /* Pro Testimonial */

    new \Kirki\Section(
		'flight_booking_testimonial_section',
		[
			'title'       => esc_html__( 'Testimonial Section', 'flight-booking' ),
			'panel'       => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_testimonial_section',
        'description' => __( '<p>a. Add more Testimonial Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Testimonial Section</p>', 'flight-booking' ),
    ] );

	/* Pro Testimonial End */

	/* Pro Our Sponsors */

    new \Kirki\Section(
		'flight_booking_sponsor_section',
		[
			'title'       => esc_html__( 'Our Sponsors Section', 'flight-booking' ),
			'panel'       => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_sponsor_section',
        'description' => __( '<p>a. Add more Our Sponsors Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Our Sponsors Section</p>', 'flight-booking' ),
    ] );

	/* Pro Our Sponsors End */

	/* Footer */

	new \Kirki\Section(
		'flight_booking_footer_section',
		[
			'title'       => esc_html__( 'Footer', 'flight-booking' ),
			'panel'		  => 'flight_booking_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_footer_widgets_on_off',
			'label'       => esc_html__( 'Footer Widgets On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_footer_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_copyright_on_off',
			'label'       => esc_html__( 'Footer Copyright On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_footer_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_copyright_content_text',
			'label'    => esc_html__( 'Copyright Text', 'flight-booking' ),
			'section'  => 'flight_booking_footer_section',
		]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'flight_booking_copyright_alignment',
		'label'       => esc_html__( 'Copyright Text Alignment', 'flight-booking' ),
		'section'     => 'flight_booking_footer_section',
		'default'     => 'Center',
		'choices'     => [
			'Left' => esc_html__( 'Left Align', 'flight-booking' ),
			'Center' => esc_html__( 'Center Align', 'flight-booking' ),
			'Right' => esc_html__( 'Right Align', 'flight-booking' ),
		],
	]
);

	new \Kirki\Field\Image(
	[
		'settings'    => 'flight_booking_footer_background_image',
		'label'       => esc_html__( 'Select Your Appropriate Image for footer background', 'flight-booking' ),
		'section'     => 'flight_booking_footer_section',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'flight_booking_footer_background_color',
		'label'       => __( 'Select Your Appropriate Color for footer background', 'flight-booking' ),
		'section'     => 'flight_booking_footer_section',
		'default'     => '#242424',
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_footer_section',
    ] );

    //Post & Pages Setting Panel
	new \Kirki\Panel(
		'flight_booking_post_pages_section',
		[
			'priority'    => 11,
			'title'       => esc_html__( 'Post & Pages Settings', 'flight-booking' ),
		]
	);

	/* Banner Options */

	new \Kirki\Section(
		'flight_booking_banner_options',
		[
			'title'       => esc_html__( 'Banner Image Settings', 'flight-booking' ),
			'priority'    => 30,
			'panel'		  => 'flight_booking_post_pages_section',
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => 'flight_booking_custom_fallback_img',
			'label'       => esc_html__( 'Featured Header Image Banner Background', 'flight-booking' ),
			'section'     => 'flight_booking_banner_options',
			'default'     => '',
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_banner_options',
    ] );

	/* Single Post Options */

	new \Kirki\Section(
		'flight_booking_single_post_options',
		[
			'title'       => esc_html__( 'Single Post Options', 'flight-booking' ),
			'priority'    => 30,
			'panel'		  => 'flight_booking_post_pages_section',
		]
	);

	/* Single Post Content Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_single_post_content_on_off',
			'label'       => esc_html__( 'Single Post Content On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Single Post Meta Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_single_meta_on_off',
			'label'       => esc_html__( 'Single Post Meta On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Single Post Feature Image Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_single_post_image_on_off',
			'label'       => esc_html__( 'Single Post Feature Image On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Single Post Pagination Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_single_post_pagination_on_off',
			'label'       => esc_html__( 'Single Post Pagination On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_single_post_options',
    ] );

    	/* Page Options */
		new \Kirki\Section(
		'flight_booking_single_page_options',
		[
			'title'       => esc_html__( 'Page Sidebar Options', 'flight-booking' ),
			'priority'    => 30,
			'panel'		  => 'flight_booking_post_pages_section',
		]
	);

	new \Kirki\Field\Radio(
	[
		'settings'    => 'flight_booking_single_page_sidebar_option',
		'label'       => esc_html__( 'Page Sidebar Settings', 'flight-booking' ),
		'section'     => 'flight_booking_single_page_options',
		'default'     => 'right',
		'priority'    => 10,
		'choices'     => [
			'right'   => esc_html__( 'Page With Right Sidebar', 'flight-booking' ),
			'left' => esc_html__( 'Page With Left Sidebar', 'flight-booking' ),
			'none'  => esc_html__( 'Page With No Sidebar', 'flight-booking' ),

		],
	]
);
	/* Page Options End*/


	/* Post Options */

	new \Kirki\Section(
		'flight_booking_post_options',
		[
			'title'       => esc_html__( 'Post Options', 'flight-booking' ),
			'priority'    => 30,
			'panel'		  => 'flight_booking_post_pages_section',
		]
	);
    
    /* Post Image Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_post_image_on_off',
			'label'       => esc_html__( 'Post Image On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Post Heading Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_post_heading_on_off',
			'label'       => esc_html__( 'Post Heading On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Post Content Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_post_content_on_off',
			'label'       => esc_html__( 'Post Content On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Post Date Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_post_date_on_off',
			'label'       => esc_html__( 'Post Date On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Post Comments Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_post_comment_on_off',
			'label'       => esc_html__( 'Post Comments On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Post Author Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_post_author_on_off',
			'label'       => esc_html__( 'Post Author On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Post Categories Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_post_categories_on_off',
			'label'       => esc_html__( 'Post Categories On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	/* Post limit Option End */
	new \Kirki\Field\Slider(
		[
			'settings'    => 'flight_booking_post_content_limit',
			'label'       => esc_html__( 'Post Content Limit', 'flight-booking' ),
			'section'     => 'flight_booking_post_options',
			'default'     => 15,
			'choices'     => [
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_post_options',
    ] );

	/* Post Options End */

	/* Post Options */

	new \Kirki\Section(
		'flight_booking_post_layouts_section',
		[
			'title'       => esc_html__( 'Post Layout Options', 'flight-booking' ),
			'priority'    => 30,
			'panel'		  => 'flight_booking_post_pages_section',
		]
	);

	new \Kirki\Field\Radio_Image(
		[
			'settings'    => 'flight_booking_post_layout',
			'label'       => esc_html__( 'Blog Layout', 'flight-booking' ),
			'section'     => 'flight_booking_post_layouts_section',
			'default'     => 'two_column_right',
			'priority'    => 10,
			'choices'     => [
				'one_column'   => get_template_directory_uri().'/images/1column.png',
				'two_column_right' => get_template_directory_uri().'/images/right-sidebar.png',
				'two_column_left'  => get_template_directory_uri().'/images/left-sidebar.png',
				'three_column'  => get_template_directory_uri().'/images/3column.png',
				'four_column'  => get_template_directory_uri().'/images/4column.png',
				'grid_post'  => get_template_directory_uri().'/images/grid.png',
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_post_layouts_section',
    ] );

	/* Post Options End */

	/* 404 Page */

	new \Kirki\Section(
		'flight_booking_404_page_section',
		[
			'title'       => esc_html__( '404 Page', 'flight-booking' ),
			'description' => esc_html__( 'Here you can add 404 Page information.', 'flight-booking' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_404_page_heading',
			'label'    => esc_html__( 'Add Heading', 'flight-booking' ),
			'section'  => 'flight_booking_404_page_section',
			'default'  => esc_html__( '404', 'flight-booking' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_404_page_content',
			'label'    => esc_html__( 'Add Content', 'flight-booking' ),
			'section'  => 'flight_booking_404_page_section',
			'default'  => esc_html__( 'Ops! Something happened...', 'flight-booking' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'flight_booking_404_page_button',
			'label'    => esc_html__( 'Add Button', 'flight-booking' ),
			'section'  => 'flight_booking_404_page_section',
			'default'  => esc_html__( 'Home', 'flight-booking' ),
			'priority' => 10,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_404_page_section',
    ] );

	/* 404 Page End */

	/* Responsive Options */

	new \Kirki\Section(
		'flight_booking_responsive_options_section',
		[
			'title'       => esc_html__( 'Responsive Options', 'flight-booking' ),
			'priority'    => 10,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_responsive_preloader_setting',
			'label'       => esc_html__( 'Preloader On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_responsive_options_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_responsive_scroll_to_top_setting',
			'label'       => esc_html__( 'Scroll To Top On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_responsive_options_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'flight_booking_responsive_options_section',
    ] );


	/* Responsive End */

	/* General Options */

	new \Kirki\Section(
		'flight_booking_general_options_section',
		[
			'title'       => esc_html__( 'General Options', 'flight-booking' ),
			'priority'    => 10,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_sticky_header_setting',
			'label'       => esc_html__( 'Show Hide Sticky Header', 'flight-booking' ),
			'section'     => 'flight_booking_general_options_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_preloader_setting',
			'label'       => esc_html__( 'Preloader On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_general_options_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'flight_booking_scroll_to_top_setting',
			'label'       => esc_html__( 'Scroll To Top On / Off', 'flight-booking' ),
			'section'     => 'flight_booking_general_options_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'flight-booking' ),
				'off' => esc_html__( 'Disable', 'flight-booking' ),
			],
		]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'flight_booking_scroll_to_top_type',
		'label'       => esc_html__( 'Scroll To Top Type', 'flight-booking' ),
		'section'     => 'flight_booking_general_options_section',
		'default' => 'advance-scroll',
		'placeholder' => esc_html__( 'Choose an option', 'flight-booking' ),
		'choices'     => [
			'advance-scroll' => __('Type 1','flight-booking'),
            'simple-scroll' => __('Type 2','flight-booking'),
		],
	] );

	new \Kirki\Field\Select(
		[
			'settings'    => 'flight_booking_scroll_top_alignment',
			'label'       => esc_html__( 'Scroll Top Alignment', 'flight-booking' ),
			'section'     => 'flight_booking_general_options_section',
			'default'     => 'Right',
			'choices'     => [
				'Left' => esc_html__( 'Left Align', 'flight-booking' ),
				'Center' => esc_html__( 'Center Align', 'flight-booking' ),
				'Right' => esc_html__( 'Right Align', 'flight-booking' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'flight_booking_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'flight-booking' ),
		'section'     => 'flight_booking_general_options_section',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'flight-booking' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'flight-booking' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( FLIGHT_BOOKING_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'flight-booking' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'flight_booking_general_options_section',
    ] );

	/* General Options End */

}