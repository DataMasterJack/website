<?php

// Set Panel ID
$panel_id = 'book-me-memories_panel_blog_options';

// Set prefix
$prefix = 'book-me-memories';

// Change panel for Site Title & Tagline Section
$site_title        = $wp_customize->get_section( 'title_tagline' );
$site_title->title = __( 'Blog Jumbotron Titles', 'book-me-memories' );
$site_title->panel = $panel_id;

// Change priority for Site Title
$site_title           = $wp_customize->get_control( 'blogname' );
$site_title->label    = __( 'Default site title', 'book-me-memories' );
$site_title->priority = 15;

// Change priority for Site Tagline
$site_title              = $wp_customize->get_control( 'blogdescription' );
$site_title->label       = __( 'Default site tagline', 'book-me-memories' );
$site_title->description = __( 'The tagline will be shown on archive pages, in the blog page right below the title.', 'book-me-memories' );
$site_title->priority    = 17;

// site title
$site_logo              = $wp_customize->get_control( 'blogname' );
$site_logo->description = __( 'This is the default WordPress title. This will be used in the blog page.', 'book-me-memories' );

$wp_customize->add_panel( $panel_id, array(
	'priority'       => 2,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Blog Options', 'book-me-memories' ),
	'description'    => __( 'You can change blog options ', 'book-me-memories' ),
) );

//
$wp_customize->get_section( 'header_image' )->panel = $panel_id;
$wp_customize->get_section( 'header_image' )->title = __( 'Blog Archive Header Image', 'book-me-memories' );

$wp_customize->add_setting(
    $prefix . '_archive_page_background_stretch',
    array(
        'sanitize_callback' => 'book-me-memories_sanitize_select',
        'default'           => 1
    )
);
$wp_customize->add_control(
    $prefix . '_archive_page_background_stretch',
    array(
        'label'         => __( 'Background Stretch', 'book-me-memories' ),
        'type'          => 'select',
        'section'       => 'header_image',
        'choices'       => array(
            1   => __( 'Cover', 'book-me-memories' ),
            2   => __( 'Contain', 'book-me-memories' ),
        )
    )
);

/***********************************************/
/************** Blog Settings  ***************/
/***********************************************/

$wp_customize->add_section( $prefix . '_blog_featured_section', array(
	'title'       => __( 'Blog Featured Image', 'book-me-memories' ),
	'description' => __( 'From this section you\'ll be able to control various single post (blog) settings.', 'book-me-memories' ),
	'panel'       => $panel_id,
) );

$wp_customize->add_setting( $prefix . '_disable_random_featured_image', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_disable_random_featured_image', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Random featured image', 'book-me-memories' ),
	'description' => __( 'Toggling this to off will disable theme provided blog images. These images are used in the theme when users don\'t provide a featured image. It\'s purposes is merely cosmetic and meant to improve the blog layout.', 'book-me-memories' ),
	'section'     => $prefix . '_blog_featured_section',
) ) );


/***********************************************/
/************** Single Blog Settings  ***************/
/***********************************************/

$wp_customize->add_section( $prefix . '_blog_global_section', array(
	'title'       => __( 'Single Post Options', 'book-me-memories' ),
	'description' => __( 'This section allows you to control how certain elements are displayed on the blog single page.', 'book-me-memories' ),
	'panel'       => $panel_id,
) );

/* Posted on on single blog posts */
$wp_customize->add_setting( $prefix . '_enable_post_posted_on_blog_posts', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_enable_post_posted_on_blog_posts', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Show Posted on', 'book-me-memories' ),
	'description' => __( 'This will disable the posted on zone as well as the author name', 'book-me-memories' ),
	'section'     => $prefix . '_blog_global_section',
) ) );

/* Post Category on single blog posts */
$wp_customize->add_setting( $prefix . '_enable_post_category_blog_posts', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_enable_post_category_blog_posts', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Show category', 'book-me-memories' ),
	'description' => __( 'This will disable the posted in zone.', 'book-me-memories' ),
	'section'       => $prefix.'_blog_global_section',
) ) );


/* Post Tags on single blog posts */
$wp_customize->add_setting( $prefix . '_enable_post_tags_blog_posts', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_enable_post_tags_blog_posts', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Show tags', 'book-me-memories' ),
	'description' => __( 'This will disable the tagged with zone.', 'book-me-memories' ),
	'section'     => $prefix . '_blog_global_section',
) ) );

/* Post Comments on single blog posts */
$wp_customize->add_setting( $prefix . '_enable_post_comments_blog_posts', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_enable_post_comments_blog_posts', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Show comments number', 'book-me-memories' ),
	'description' => __( 'This will disable the comments header zone.', 'book-me-memories' ),
	'section'     => $prefix . '_blog_global_section',
) ) );

/* Author Info Box on single blog posts */
$wp_customize->add_setting( $prefix . '_enable_author_box_blog_posts', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
) );
$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_enable_author_box_blog_posts', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Show author box', 'book-me-memories' ),
	'description' => __( 'Displayed right at the end of the post', 'book-me-memories' ),
	'section'     => $prefix . '_blog_global_section',
) ) );

/***********************************************/
/************** Title Blog Settings  ***************/
/***********************************************/
