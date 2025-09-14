<?php
/**
 * Book Me Memories Theme (based on Illdy)
 * Extended with auto-page setup, menus, and footer info
 */

// -------------------
// THEME SETUP
// -------------------
if ( ! function_exists( 'illdy_setup' ) ) {
	add_action( 'after_setup_theme', 'illdy_setup' );
	function illdy_setup() {

		// Core includes
		require_once trailingslashit( get_template_directory() ) . 'inc/extras.php';
		require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer.php';
		require_once trailingslashit( get_template_directory() ) . 'inc/jetpack.php';
		require_once trailingslashit( get_template_directory() ) . 'inc/components/entry-meta/class.mt-entry-meta.php';
		require_once trailingslashit( get_template_directory() ) . 'inc/components/author-box/class.mt-author-box.php';
		require_once trailingslashit( get_template_directory() ) . 'inc/components/related-posts/class.mt-related-posts.php';

		// Theme textdomain
		load_theme_textdomain( 'illdy', get_template_directory() . '/languages' );

		// Theme support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array(
			'height'      => 75,
   			'flex-height' => false,
			'flex-width'  => true,
		));
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'custom-header', array(
			'default-image'  => esc_url( get_template_directory_uri() . '/layout/images/blog/blog-header.png' ),
			'width'          => 1920,
			'height'         => 532,
			'flex-height'    => true,
			'flex-width'     => true,
			'random-default' => true,
			'header-text'    => false,
		));
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Nav menus
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'book-me-memories' ),
			'footer'  => __( 'Footer Menu', 'book-me-memories' ),
		));

		// Default headers
		register_default_headers( array(
			'default' => array(
				'url'           => '%s/layout/images/blog/blog-header.png',
				'thumbnail_url' => '%s/layout/images/blog/blog-header.png',
				'description'   => __( 'Default', 'illdy' )
			),
		));

		// Back compatible
		require get_template_directory() . '/inc/back-compatible.php';
	}
}

// -------------------
// STYLES & SCRIPTS
// -------------------
add_action( 'wp_enqueue_scripts', 'illdy_enqueue_stylesheets' );
function illdy_enqueue_stylesheets() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/layout/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/layout/css/font-awesome.min.css' );
	wp_enqueue_style( 'illdy-style', get_stylesheet_uri(), array(), '1.0.16', 'all' );
}

add_action( 'wp_enqueue_scripts', 'illdy_enqueue_javascripts' );
function illdy_enqueue_javascripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/layout/js/bootstrap/bootstrap.min.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'illdy-scripts', get_template_directory_uri() . '/layout/js/scripts.min.js', array('jquery'), '1.0.16', true );

	// ✅ fixed: removed stray backslash
	if ( is_front_page() ) {
		wp_add_inline_script( 'illdy-scripts', "console.log('Front page loaded');" );
	}
}

// -------------------
// FOOTER INFO
// -------------------
function bookmememories_footer_info() {
    echo '<div class="footer-contact">';
    echo '<p>📞 +91 9426224669 | ✉️ <a href="mailto:support@bookmememories.in">support@bookmememories.in</a></p>';
    echo '<p>📍 A-105, Business Park, PDPU Rd, Raysan, Gujarat 382426</p>';
    echo '<p>💬 <a href="https://wa.me/919408881889" target="_blank">Chat on WhatsApp</a></p>';
    echo '<p>💳 Payment Partner: <img src="https://razorpay.com/favicon.png" alt="Razorpay" style="height:24px;"></p>';
    echo '</div>';
}
add_action( 'wp_footer', 'bookmememories_footer_info' );

// -------------------
// SECURITY HEADERS
// -------------------
function bookmememories_security_headers() {
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'X-Content-Type-Options: nosniff' );
    header( 'Referrer-Policy: no-referrer-when-downgrade' );
}
add_action( 'send_headers', 'bookmememories_security_headers' );

// -------------------
// AUTO CREATE PAGES + MENUS
// -------------------
function bookmememories_create_pages_and_menus() {
    $pages = array(
        'Home' => 'Welcome to Book Me Memories – your AI-powered flight booking partner!',
        'About Us' => 'We provide AI-powered flight search and booking.',
        'Contact Us' => '📞 +91 9426224669<br>✉️ support@bookmememories.in<br>📍 A-105, Business Park, PDPU Rd, Raysan, Gujarat 382426<br>💬 <a href="https://wa.me/919408881889">Chat on WhatsApp</a>',
        'Privacy Policy' => 'Our privacy policy ensures your data is safe with Book Me Memories.',
        'Terms & Conditions' => 'These are the terms and conditions for using Book Me Memories services.',
        'Refund & Cancellation' => 'Refund and cancellation policies for flight bookings.',
        'FAQ' => 'Frequently Asked Questions about Book Me Memories.',
        'Careers' => 'Join Book Me Memories and help revolutionize AI-powered travel booking.',
        'Sitemap' => 'This is the sitemap of Book Me Memories website.',
    );

    $created_pages = array();
    foreach ($pages as $title => $content) {
        $page_check = get_page_by_title($title);
        if (!isset($page_check->ID)) {
            $page_id = wp_insert_post(array(
                'post_title'   => $title,
                'post_content' => $content,
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ));
            $created_pages[$title] = $page_id;
        } else {
            $created_pages[$title] = $page_check->ID;
        }
    }

    // Set Home as static front page
    if (isset($created_pages['Home'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $created_pages['Home']);
    }

    // Primary Menu
    $primary_menu = 'Primary Menu';
    if (!wp_get_nav_menu_object($primary_menu)) {
        $menu_id = wp_create_nav_menu($primary_menu);
        $order = array('Home', 'About Us', 'Contact Us', 'FAQ', 'Careers', 'Sitemap', 'Privacy Policy', 'Terms & Conditions', 'Refund & Cancellation');
        foreach ($order as $title) {
            if (isset($created_pages[$title])) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $title,
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $created_pages[$title],
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish'
                ));
            }
        }
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    // Footer Menu
    $footer_menu = 'Footer Menu';
    if (!wp_get_nav_menu_object($footer_menu)) {
        $menu_id = wp_create_nav_menu($footer_menu);
        $order = array('Privacy Policy', 'Terms & Conditions', 'Refund & Cancellation', 'Sitemap');
        foreach ($order as $title) {
            if (isset($created_pages[$title])) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $title,
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $created_pages[$title],
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish'
                ));
            }
        }
        $locations = get_theme_mod('nav_menu_locations');
        $locations['footer'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action( 'after_switch_theme', 'bookmememories_create_pages_and_menus' );
