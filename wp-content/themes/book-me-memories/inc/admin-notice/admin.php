<?php 
/*******************************************************************************
 *  Get Started Notice
 *******************************************************************************/

add_action( 'wp_ajax_flight_booking_dismissed_notice_handler', 'flight_booking_ajax_notice_handler' );

/** * AJAX handler to record dismissible notice status. */
function flight_booking_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function flight_booking_admin_notice_deprecated_hook() {
        $current_screen = get_current_screen();
        if ($current_screen->id !== 'toplevel_page_flight-booking-guide-page') {
        if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="flight-booking-getting-started-notice clearfix">
                    <div class="flight-booking-theme-notice-content">
                        <h2 class="flight-booking-notice-h2">
                            <?php
                            echo esc_html__( 'Let\'s Create Your website With', 'flight-booking' ) . ' <strong>' . esc_html( wp_get_theme()->get('Name') ) . '</strong>';
                            ?>
                        </h2>
                        <span class="st-notification-wrapper">
                            <span class="st-notification-column-wrapper">
                                <span class="st-notification-column">
                                    <h2><?php echo esc_html('Features Rich Theme','flight-booking'); ?></h2>
                                    <ul class="st-notification-column-list">
                                        <li><?php echo esc_html('Live Customize','flight-booking'); ?></li>
                                        <li><?php echo esc_html('Detailed theme Options','flight-booking'); ?></li>
                                        <li><?php echo esc_html('Cleanly Coded','flight-booking'); ?></li>
                                        <li><?php echo esc_html('Search Engine Friendly','flight-booking'); ?></li>
                                    </ul>
                                </span>
                                <span class="st-notification-column">
                                    <h2><?php echo esc_html('Customize Your Site','flight-booking'); ?></h2>
                                    <ul>
                                        <li><a href="<?php echo esc_url( admin_url( 'customize.php' ) ) ?>" target="_blank" class="button button-primary"><?php echo esc_html('Customize','flight-booking'); ?></a></li>
                                        <li><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ) ?>" class="button button-primary"><?php echo esc_html('Add Widgets','flight-booking'); ?></a></li>
                                        <li><a href="<?php echo esc_url( FLIGHT_BOOKING_SUPPORT_FREE ); ?>" target="_blank" class="button button-primary"><?php echo esc_html('Get Support','flight-booking'); ?></a> </li>
                                        <li><a href="<?php echo esc_url( admin_url( 'themes.php?page=flight-booking-guide-page' ) ); ?>" class="button-primary button get-start"><?php echo esc_html('Getting Started','flight-booking'); ?></a></li>
                                    </ul>
                                </span>
                                <span class="st-notification-column">
                                    <h2><?php echo esc_html('Get More Options','flight-booking'); ?></h2>
                                    <ul>
                                        <li><a href="<?php echo esc_url( FLIGHT_BOOKING_DEMO_PRO ); ?>" target="_blank" class="button button-primary"><?php echo esc_html('View Live Demo','flight-booking'); ?></a></li>
                                        <li><a href="<?php echo esc_url( FLIGHT_BOOKING_BUY_NOW ); ?>" target="_blank" class="button button-primary premium"><?php echo esc_html('Purchase Now','flight-booking'); ?></a></li>
                                        <li><a href="<?php echo esc_url( FLIGHT_BOOKING_DOCS_FREE ); ?>" target="_blank" class="button button-primary"><?php echo esc_html('Free Documentation','flight-booking'); ?></a> </li>
                                        <li><a href="<?php echo esc_url( admin_url( 'themes.php?page=flightbooking-wizard' ) ); ?>" class="button button-primary demo-import"><?php echo esc_html('Demo Importer','flight-booking'); ?></a> </li>
                                    </ul>
                                </span>
                            </span>
                            <span class="notice-img">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/notice.png' ); ?>">                                
                            </span>
                        </span>
                        <style>
                        </style>
                    </div>
                </div>
            </div>
        <?php }
    }
}

add_action( 'admin_notices', 'flight_booking_admin_notice_deprecated_hook' );

function flight_booking_switch_theme_function () {
    delete_option('dismissed-get_started', FALSE );
}

add_action('after_switch_theme', 'flight_booking_switch_theme_function');