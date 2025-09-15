<?php
// Set Panel ID
$panel_id = 'book-me-memories_full_width';

// Set prefix
$prefix = 'book-me-memories';

$wp_customize->add_section( $panel_id,
    array(
        'priority'          => book-me-memories_get_section_position($panel_id),
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Full Width Section', 'book-me-memories' ),
        'description'       => __( 'Control title and description of full width section.', 'book-me-memories' ),
        'panel'             => 'book-me-memories_frontpage_panel'
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_full_width_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, 
    $prefix . '_full_width_general_show',
    array(
        'type'      => 'mte-toggle',
        'label'     => __( 'Show this section?', 'book-me-memories' ),
        'section'   => $panel_id,
        'priority'  => 1
    ) )
);

// Show this section
$wp_customize->add_setting( $prefix . '_full_width_padding',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, 
    $prefix . '_full_width_padding',
    array(
        'type'      => 'mte-toggle',
        'label'     => __( 'Add padding to section ?', 'book-me-memories' ),
        'section'   => $panel_id,
        'priority'  => 1
    ) )
);

// Title
$wp_customize->add_setting( $prefix .'_full_width_general_title',
    array(
        'sanitize_callback' => 'book-me-memories_sanitize_html',
        'default'           => '',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_full_width_general_title',
    array(
        'label'         => __( 'Title', 'book-me-memories' ),
        'description'   => __( 'Add the title for this section.', 'book-me-memories'),
        'section'       => $panel_id,
        'priority'      => 2
    )
);
$wp_customize->selective_refresh->add_partial( $prefix .'_full_width_general_title', array(
    'selector' => '#full-width .section-header h3',
) );

$wp_customize->add_setting( $prefix .'_full_width_general_entry',
    array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new Epsilon_Editor_Custom_Control(
    $wp_customize,
    $prefix .'_full_width_general_entry',
    array(
        'label'         => __( 'Entry', 'book-me-memories' ),
        'description'   => __( 'Add the content for this section.', 'book-me-memories'),
        'section'       => $panel_id,
        'priority'      => 3,
    ) )
);
$wp_customize->selective_refresh->add_partial( $prefix .'_full_width_general_entry', array(
    'selector' => '#full-width .section-header .section-description',
) );
$wp_customize->add_setting( $prefix .'_full_width_widget_button',
    array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    new Epsilon_Control_Button(
        $wp_customize,
        $prefix .'_full_width_widget_button',
        array(
            'text'         => __( 'Add & Edit widgets', 'book-me-memories' ),
            'section_id'    => 'sidebar-widgets-front-page-full-width-sidebar',
            'icon'          => 'dashicons-plus',
            'section'       => $panel_id,
            'priority'      => 5
        )
    )
);
$wp_customize->add_setting( $prefix . '_full_width_tab', array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    )
);
$wp_customize->add_control(  new Epsilon_Control_Tab( $wp_customize,
    $prefix . '_full_width_tab',
    array(
        'type'      => 'epsilon-tab',
        'section'   => $panel_id,
        'buttons'   => array(
            array(
                'name' => __( 'Colors', 'book-me-memories' ),
                'fields'    => array(
                    $prefix . '_full_width_title_color',
                    $prefix . '_full_width_descriptions_color',
                    $prefix . '_full_width_general_color',
                    $prefix . '_full_width_full_text',
                    ),
                'active' => true
                ),
            array(
                'name' => __( 'Backgrounds', 'book-me-memories' ),
                'fields'    => array(
                    $prefix . '_full_width_general_image',
                    $prefix . '_full_width_background_size',
                    $prefix . '_full_width_background_repeat',
                    $prefix . '_full_width_background_attachment',
                    $prefix . '_full_width_background_position',
                    ),
                ),
            ),
    ) )
);

// Background Image
$wp_customize->add_setting( $prefix . '_full_width_general_image', array(
    'sanitize_callback' => 'esc_url',
    'default'           => '',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_full_width_general_image', array(
    'label'    => __( 'Background Image', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => $prefix . '_full_width_general_image',
) ) );
$wp_customize->add_setting( $prefix.'_full_width_background_position_x', array(
    'default'        => 'center',
    'sanitize_callback' => 'esc_html',
    'transport'         => 'postMessage',
) );
$wp_customize->add_setting( $prefix.'_full_width_background_position_y', array(
    'default'        => 'center',
    'sanitize_callback' => 'esc_html',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Background_Position_Control( $wp_customize, $prefix.'_full_width_background_position', array(
    'label'    => __( 'Background Position', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => array(
        'x' => $prefix.'_full_width_background_position_x',
        'y' => $prefix.'_full_width_background_position_y',
    ),
) ) );
$wp_customize->add_setting( $prefix . '_full_width_background_size', array(
    'default' => 'cover',
    'sanitize_callback' => 'book-me-memories_sanitize_background_size',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_full_width_background_size', array(
    'label'      => __( 'Image Size', 'book-me-memories' ),
    'section'    => $panel_id,
    'type'       => 'select',
    'choices'    => array(
        'auto'    => __( 'Original', 'book-me-memories' ),
        'contain' => __( 'Fit to Screen', 'book-me-memories' ),
        'cover'   => __( 'Fill Screen', 'book-me-memories' ),
    ),
) );

$wp_customize->add_setting( $prefix . '_full_width_background_repeat', array(
    'sanitize_callback' => $prefix . '_sanitize_checkbox',
    'default'           => 0,
    'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_full_width_background_repeat', array(
    'type'        => 'mte-toggle',
    'label'       => __( 'Repeat Background Image', 'book-me-memories' ),
    'section'     => $panel_id,
) ) );

$wp_customize->add_setting( $prefix . '_full_width_background_attachment', array(
    'sanitize_callback' => $prefix . '_sanitize_checkbox',
    'default'           => 0,
    'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_full_width_background_attachment', array(
    'type'        => 'mte-toggle',
    'label'       => __( 'Scroll with Page', 'book-me-memories' ),
    'section'     => $panel_id,
) ) );

$wp_customize->add_setting( $prefix . '_full_width_general_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#fff',
    'transport'         => 'postMessage',

) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_full_width_general_color', array(
    'label'    => __( 'Background Color', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => $prefix . '_full_width_general_color',
) ) );

$wp_customize->add_setting( $prefix . '_full_width_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#545454',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_full_width_title_color', array(
    'label'    => __( 'Title Color', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => $prefix . '_full_width_title_color',
) ) );

$wp_customize->add_setting( $prefix . '_full_width_descriptions_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#8c9597',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_full_width_descriptions_color', array(
    'label'    => __( 'Description Color', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => $prefix . '_full_width_descriptions_color',
) ) );

$wp_customize->add_setting( $prefix . '_full_width_full_text', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#fff',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_full_width_full_text', array(
    'label'    => __( 'Title & Description Color for Full & Small Parallax Widget', 'book-me-memories' ),
    'section'  => $panel_id,
    'settings' => $prefix . '_full_width_full_text',
) ) );