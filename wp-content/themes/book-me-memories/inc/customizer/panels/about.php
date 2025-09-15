<?php
// Set Panel ID
$panel_id = 'book-me-memories_panel_about';

// Set prefix
$prefix = 'book-me-memories';

/***********************************************/
/********************* ABOUT  ******************/
/***********************************************/
$wp_customize->add_section( $panel_id,
    array(
        'priority'          => book-me-memories_get_section_position($panel_id),
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'About Section', 'book-me-memories' ),
        'description'       => __( 'Control various options for about section from front page.', 'book-me-memories' ),
        'panel'             => 'book-me-memories_frontpage_panel'
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/


// Show this section
$wp_customize->add_setting( $prefix . '_about_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, 
    $prefix . '_about_general_show',
    array(
        'type'      => 'mte-toggle',
        'label'     => __( 'Show this section?', 'book-me-memories' ),
        'section'   => $panel_id,
        'priority'  => 1
    ) )
);

// Title
$wp_customize->add_setting( $prefix .'_about_general_title',
    array(
        'sanitize_callback' => 'book-me-memories_sanitize_html',
        'default'           => __( 'About', 'book-me-memories' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_about_general_title',
    array(
        'label'         => __( 'Title', 'book-me-memories' ),
        'description'   => __( 'Add the title for this section.', 'book-me-memories'),
        'section'       => $panel_id,
        'priority'      => 2
    )
);
$wp_customize->selective_refresh->add_partial( $prefix .'_about_general_title', array(
    'selector' => '#about .section-header h3',
    'render_callback' => $prefix .'_about_general_title',
) );

// Entry
if ( get_theme_mod( $prefix .'_about_general_entry' ) ) {
    $wp_customize->add_setting( $prefix .'_about_general_entry',
        array(
            'sanitize_callback' => 'wp_kses_post',
            'default'           => __( 'It is an amazing one-page theme with great features that offers an incredible experience. It is easy to install, make changes, adapt for your business. A modern design with clean lines and styling for a wide variety of content, exactly how a business design should be. You can add as many images as you want to the main header area and turn them into slider.', 'book-me-memories' ),
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( new Epsilon_Editor_Custom_Control(
        $wp_customize,
        $prefix .'_about_general_entry',
        array(
            'label'         => __( 'Entry', 'book-me-memories' ),
            'description'   => __( 'Add the content for this section.', 'book-me-memories'),
            'section'       => $panel_id,
            'priority'      => 3,
            'type'          => 'textarea'
        ) )
    );
}elseif ( !defined( "ILLDY_COMPANION" ) ) {
    
    $wp_customize->add_setting(
        $prefix . '_about_general_text',
        array(
            'sanitize_callback' => 'esc_html',
            'default'           => '',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new Book Me Memories_Text_Custom_Control(
            $wp_customize, $prefix . '_about_general_text',
            array(
                'label'             => __( 'Install "Book Me Memories" Companion', 'book-me-memories' ),
                'description'       => sprintf(__( 'In order to edit description please install <a href="%s" target="_blank">"Book Me Memories" Companion</a>', 'book-me-memories' ), book-me-memories_get_recommended_actions_url()),
                'section'           => $panel_id,
                'settings'          => $prefix . '_about_general_text',
                'priority'          => 3,
            )
        )
    );

}
$wp_customize->selective_refresh->add_partial( $prefix .'_about_general_entry', array(
    'selector' => '#about .section-header .section-description',
    'render_callback' => $prefix .'_about_general_entry',
) );

$wp_customize->add_setting( $prefix .'_about_widget_button',
    array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    )
);
$wp_customize->add_control(
    new Epsilon_Control_Button(
        $wp_customize,
        $prefix .'_about_widget_button',
        array(
            'text'         => __( 'Add & Edit skill bars', 'book-me-memories' ),
            'section_id'    => 'sidebar-widgets-front-page-about-sidebar',
            'icon'          => 'dashicons-plus',
            'section'       => $panel_id,
            'priority'      => 5
        )
    )
);

$wp_customize->add_setting( $prefix . '_about_tab', array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    )
);
$wp_customize->add_control(  new Epsilon_Control_Tab( $wp_customize,
    $prefix . '_about_tab',
    array(
        'type'      => 'epsilon-tab',
        'section'   => $panel_id,
        'buttons'   => array(
            array(
                'name' => __( 'Colors', 'book-me-memories' ),
                'fields'    => array(
                    $prefix . '_about_title_color',
                    $prefix . '_about_descriptions_color',
                    $prefix . '_about_general_color',
                    ),
                'active' => true
                ),
            array(
                'name' => __( 'Backgrounds', 'book-me-memories' ),
                'fields'    => array(
                    $prefix . '_about_general_image',
                    $prefix . '_about_background_size',
                    $prefix . '_about_background_repeat',
                    $prefix . '_about_background_attachment',
                    $prefix . '_about_background_position',
                    ),
                ),
            ),
    ) )
);

// Background Image
$wp_customize->add_setting( $prefix . '_about_general_image', array(
    'sanitize_callback' => 'esc_url',
    'default'           => '',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_about_general_image', array(
    'label'    => __( 'Background Image', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => $prefix . '_about_general_image',
) ) );
$wp_customize->add_setting( $prefix.'_about_background_position_x', array(
    'default'        => 'center',
    'sanitize_callback' => 'esc_html',
    'transport'         => 'postMessage',
) );
$wp_customize->add_setting( $prefix.'_about_background_position_y', array(
    'default'        => 'center',
    'sanitize_callback' => 'esc_html',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Background_Position_Control( $wp_customize, $prefix.'_about_background_position', array(
    'label'    => __( 'Background Position', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => array(
        'x' => $prefix.'_about_background_position_x',
        'y' => $prefix.'_about_background_position_y',
    ),
) ) );
$wp_customize->add_setting( $prefix . '_about_background_size', array(
    'default' => 'cover',
    'sanitize_callback' => 'book-me-memories_sanitize_background_size',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_about_background_size', array(
    'label'      => __( 'Image Size', 'book-me-memories' ),
    'section'    => $panel_id,
    'type'       => 'select',
    'choices'    => array(
        'auto'    => __( 'Original', 'book-me-memories' ),
        'contain' => __( 'Fit to Screen', 'book-me-memories' ),
        'cover'   => __( 'Fill Screen', 'book-me-memories' ),
    ),
) );

$wp_customize->add_setting( $prefix . '_about_background_repeat', array(
    'sanitize_callback' => $prefix . '_sanitize_checkbox',
    'default'           => 0,
    'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_about_background_repeat', array(
    'type'        => 'mte-toggle',
    'label'       => __( 'Repeat Background Image', 'book-me-memories' ),
    'section'     => $panel_id,
) ) );

$wp_customize->add_setting( $prefix . '_about_background_attachment', array(
    'sanitize_callback' => $prefix . '_sanitize_checkbox',
    'default'           => 0,
    'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_about_background_attachment', array(
    'type'        => 'mte-toggle',
    'label'       => __( 'Scroll with Page', 'book-me-memories' ),
    'section'     => $panel_id,
) ) );

$wp_customize->add_setting( $prefix . '_about_general_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#fff',
    'transport'         => 'postMessage',

) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_about_general_color', array(
    'label'    => __( 'Background Color', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => $prefix . '_about_general_color',
) ) );

$wp_customize->add_setting( $prefix . '_about_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#545454',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_about_title_color', array(
    'label'    => __( 'Title Color', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => $prefix . '_about_title_color',
) ) );

$wp_customize->add_setting( $prefix . '_about_descriptions_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#8c9597',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_about_descriptions_color', array(
    'label'    => __( 'Description Color', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => $prefix . '_about_descriptions_color',
) ) );