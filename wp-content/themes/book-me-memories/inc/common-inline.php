<?php

/*----------------------------------------------------------------------------------*/

$flight_booking_common_inline_css = '';

$flight_booking_scroll_top_alignment = get_theme_mod('flight_booking_scroll_top_alignment', 'Right');

$flight_booking_alignment_styles = [
    'Left' => 'left: 20px;',
    'Center' => 'right: 0; left: 0; margin: 0 auto;',
    'Right' => 'right: 20px;'
];

$alignment_style = $flight_booking_alignment_styles[$flight_booking_scroll_top_alignment] ?? $flight_booking_alignment_styles['Right'];

$flight_booking_common_inline_css .= "a.scrollup,button#scroll_2 { $alignment_style }";

/*----------------------------------------------------------------------------------*/

$flight_booking_footer_background_color = get_theme_mod('flight_booking_footer_background_color', '#242424');

if (!empty($flight_booking_footer_background_color)) {
    $flight_booking_common_inline_css .= ".footer-widgets { background: " . esc_attr($flight_booking_footer_background_color) . "}";
}

/*----------------------------------------------------------------------------------*/

$flight_booking_footer_background_image = get_theme_mod('flight_booking_footer_background_image', '');

if (!empty($flight_booking_footer_background_image)) {
    $flight_booking_common_inline_css .= ".footer-widgets { background-image: url('" . esc_url($flight_booking_footer_background_image) . "') !important; background-size: cover; background-repeat: no-repeat; }";
}

/*----------------------------------------------------------------------------------*/

$flight_booking_copyright_alignment = get_theme_mod('flight_booking_copyright_alignment', 'Center');

$flight_booking_copyright_alignment_styles = [
    'Left' => 'text-align: left;',
    'Center' => 'text-align: center;',
    'Right' => 'text-align: right;'
];

$alignment_style = $flight_booking_copyright_alignment_styles[$flight_booking_copyright_alignment] ?? $flight_booking_copyright_alignment_styles['Center'];

$flight_booking_common_inline_css .= "#footer-copyright p { $alignment_style }";

/*----------------------------------------------------------------------------------*/

$flight_booking_container_width = get_theme_mod('flight_booking_container_width');

if (!empty($flight_booking_container_width)) {
    $flight_booking_common_inline_css .= "@media (min-width: 1024px) { 
        body, .navbar-area.header-fixed, .admin-bar .header-fixed,.loading { 
            width: " . esc_attr($flight_booking_container_width) . "%; 
            margin: 0 auto; 
        } 
        .admin-bar .header-fixed { 
            margin-top: 32px; 
        } 
    }";
}

/*----------------------------------------------------------------------------------*/   

$flight_booking_responsive_scroll_to_top_setting = get_theme_mod( 'flight_booking_responsive_scroll_to_top_setting', true );

if ( $flight_booking_responsive_scroll_to_top_setting == true && get_theme_mod( 'flight_booking_scroll_to_top_setting', true ) != true ) {
    $flight_booking_common_inline_css .= "a.scrollup,button#scroll_2 {
        display: none !important;
    }";
}

if ( $flight_booking_responsive_scroll_to_top_setting == true ) {
    $flight_booking_common_inline_css .= "@media screen and (max-width: 768px) {
        a.scrollup,button#scroll_2 {
            display: block !important;
        }
    }";
} elseif ( $flight_booking_responsive_scroll_to_top_setting == false ) {
    $flight_booking_common_inline_css .= "@media screen and (max-width: 768px) {
        a.scrollup,button#scroll_2 {
            display: none !important;
        }
    }";
}

/*----------------------------------------------------------------------------------*/ 

$flight_booking_responsive_preloader_setting = get_theme_mod( 'flight_booking_responsive_preloader_setting', false );

if ( $flight_booking_responsive_preloader_setting == true && get_theme_mod( 'flight_booking_preloader_setting', false ) == false ) {
    $flight_booking_common_inline_css .= "@media screen and (min-width: 768px) {
        .loading {
            display: none !important;
        }
    }";
}

if ( $flight_booking_responsive_preloader_setting == false ) {
    $flight_booking_common_inline_css .= "@media screen and (max-width: 768px) {
        .loading {
            display: none !important;
        }
    }";
}

/*----------------------------------------------------------------------------------*/ 