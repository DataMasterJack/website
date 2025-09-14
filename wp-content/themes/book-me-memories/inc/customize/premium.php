<?php
function flight_booking_premium_setting( $wp_customize ) {
	
	/*=========================================
	Page Layout Settings Section
	=========================================*/
	$wp_customize->add_section(
        'flight_booking_upgrade_premium',
        array(
            'title' 		=> __('Upgrade to Pro','flight-booking'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	Add Buttons
	=========================================*/
	
	class Flight_Booking_WP_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'flight_booking_upgrade_premium';

	   function render_content() {
		?>
			<div class="premium_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FLIGHT_BOOKING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Upgrade to Pro','flight-booking' ); ?> </a></li>
				</ul>
			</div>
			<div class="premium_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FLIGHT_BOOKING_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo','flight-booking' ); ?> </a></li>
				</ul>
			</div>
			<div class="premium_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FLIGHT_BOOKING_DOCS_FREE ); ?>" target="_blank"><?php esc_html_e( 'Free Documentation','flight-booking' ); ?> </a></li>
				</ul>
			</div>
			<div class="premium_info discount-box">
				<ul>
					<li class="discount-text"><?php esc_html_e( 'Special Discount of 35% Use Code “winter35”','flight-booking' ); ?></li>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FLIGHT_BOOKING_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Wordpress Theme Bundle','flight-booking' ); ?> </a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting('flight_booking_premium_info_buttons', array(
	   'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'flight_booking_sanitize_text',
	));
		
	$wp_customize->add_control( new Flight_Booking_WP_Button_Customize_Control( $wp_customize, 'flight_booking_premium_info_buttons', array(
		'section' => 'flight_booking_upgrade_premium',
    ))
);
}
add_action( 'customize_register', 'flight_booking_premium_setting' );