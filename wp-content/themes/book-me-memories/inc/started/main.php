<?php

add_action( 'admin_menu', 'flight_booking_getting_started' );
function flight_booking_getting_started() {
    add_theme_page( 
		esc_html__('Getting Started', 'flight-booking'), 
		esc_html__('Getting Started', 'flight-booking'), 
		'manage_options', 
		'flight-booking-guide-page', 
		'flight_booking_test_guide'
	);
}

if ( ! defined( 'FLIGHT_BOOKING_DOCS_FREE' ) ) {
define('FLIGHT_BOOKING_DOCS_FREE',__('https://www.mishkatwp.com/instruction/flight-booking-free-docs/','flight-booking'));
}
if ( ! defined( 'FLIGHT_BOOKING_DOCS_PRO' ) ) {
define('FLIGHT_BOOKING_DOCS_PRO',__('https://www.mishkatwp.com/instruction/flight-booking-pro-docs/','flight-booking'));
}
if ( ! defined( 'FLIGHT_BOOKING_BUY_NOW' ) ) {
define('FLIGHT_BOOKING_BUY_NOW',__('https://www.mishkatwp.com/themes/flight-booking-wordpress-theme/','flight-booking'));
}
if ( ! defined( 'FLIGHT_BOOKING_SUPPORT_FREE' ) ) {
define('FLIGHT_BOOKING_SUPPORT_FREE',__('https://wordpress.org/support/theme/flight-booking','flight-booking'));
}
if ( ! defined( 'FLIGHT_BOOKING_REVIEW_FREE' ) ) {
define('FLIGHT_BOOKING_REVIEW_FREE',__('https://wordpress.org/support/theme/flight-booking/reviews/#new-post','flight-booking'));
}
if ( ! defined( 'FLIGHT_BOOKING_DEMO_PRO' ) ) {
define('FLIGHT_BOOKING_DEMO_PRO',__('https://www.mishkatwp.com/pro/flight-booking/','flight-booking'));
}
if ( ! defined( 'FLIGHT_BOOKING_BUNDLE' ) ) {
define('FLIGHT_BOOKING_BUNDLE',__('https://www.mishkatwp.com/themes/wordpress-theme-bundle/','flight-booking'));
}

function flight_booking_test_guide() { ?>
	<?php $flight_booking_theme = wp_get_theme();?>
	<div class="wrap" id="main-page">
		<div id="righty">
			<div class="getstart-postbox donate">
				<h4><?php esc_html_e( 'Discount Upto 25%', 'flight-booking' ); ?> <span><?php esc_html_e( '"Special25"', 'flight-booking' ); ?></span></h4>
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'flight-booking' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Click to upgrade to see the enhanced pro features available in the premium version.','flight-booking'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( FLIGHT_BOOKING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'flight-booking' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( FLIGHT_BOOKING_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'flight-booking' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( FLIGHT_BOOKING_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'flight-booking' ) ?></a>
					</div>
				</div>
				<div class="d-table">
				    <ul class="d-column">
				      <li class="feature"><?php esc_html_e('Features','flight-booking'); ?></li>
				      <li class="free"><?php esc_html_e('Pro','flight-booking'); ?></li>
				      <li class="plus"><?php esc_html_e('Free','flight-booking'); ?></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('24hrs Priority Support','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('LearnPress Campatiblity','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Kirki Framework','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Advance Posttype','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('One Click Demo Import','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Section Reordering','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Enable / Disable Option','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Multiple Sections','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Advance Color Pallete','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Advance Widgets','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Page Templates','flight-booking'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
	  			</div>
			</div>
		</div>
		<div id="lefty">
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','flight-booking'); ?><?php echo esc_html( $flight_booking_theme ); ?>  <span><?php esc_html_e('Version: ', 'flight-booking'); ?><?php echo esc_html($flight_booking_theme['Version']);?></span></h3>
				<div class="demo-import-box">
					<h4><?php echo esc_html('IMPORT HOMEPAGE','flight-booking'); ?></h4>
					<p><?php echo esc_html('Get started with the wordpress theme installation','flight-booking'); ?></p>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=flightbooking-wizard' ) ); ?>" class="blue-button-1">
					    <?php echo esc_html__( 'Demo Importer', 'flight-booking' ); ?>
					</a>
				</div>
				<h4 class="feature-head"><?php esc_html_e('Begin with our theme features:-','flight-booking'); ?></h4>
				<div class="customizer-inside">
					<div class="flight-booking-theme-setting-item">
                        <div class="flight-booking-theme-setting-item-header">
                            <?php esc_html_e( 'Add Menus', 'flight-booking' ); ?>                            
                       	</div>
                        <div class="flight-booking-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>"><?php esc_html_e('Go to Menu', 'flight-booking'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to menu >> Select menu which you had created >> Then Publish ', 'flight-booking' ); ?></p>
                	</div>
                	<div class="flight-booking-theme-setting-item">
                        <div class="flight-booking-theme-setting-item-header">
                            <?php esc_html_e( 'Add Logo', 'flight-booking' ); ?>                            
                       	</div>
                        <div class="flight-booking-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>"><?php esc_html_e('Go to Site Identity', 'flight-booking'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Site Identity >> Select Logo Add Title or Tagline >> Then Publish ', 'flight-booking' ); ?></p>
                	</div>
                	<div class="flight-booking-theme-setting-item">
                        <div class="flight-booking-theme-setting-item-header">
                            <?php esc_html_e( 'Home Page Section', 'flight-booking' ); ?>                            
                       	</div>
                        <div class="flight-booking-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=flight_booking_home_page_section') ); ?>"><?php esc_html_e('Go to Home Page Section', 'flight-booking'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Home Page Sections >> Then go to different section which ever you want >> Then Publish ', 'flight-booking' ); ?></p>
                	</div>
                	<div class="flight-booking-theme-setting-item">
                        <div class="flight-booking-theme-setting-item-header">
                            <?php esc_html_e( 'Post Options', 'flight-booking' ); ?>                            
                       	</div>
                        <div class="flight-booking-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=flight_booking_post_image_on_off') ); ?>"><?php esc_html_e('Go to Post Options', 'flight-booking'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Post Options >> Then go to different settings which ever you want >> Then Publish ', 'flight-booking' ); ?></p>
                	</div>
                	<div class="flight-booking-theme-setting-item">
                        <div class="flight-booking-theme-setting-item-header">
                            <?php esc_html_e( 'Post Layout Options', 'flight-booking' ); ?>                            
                       	</div>
                        <div class="flight-booking-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=flight_booking_post_layout') ); ?>"><?php esc_html_e('Go to Post Layout Options', 'flight-booking'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Post Layout Options >> Then go to different settings which ever you want >> Then Publish ', 'flight-booking' ); ?></p>
                	</div>
                	<div class="flight-booking-theme-setting-item">
                        <div class="flight-booking-theme-setting-item-header">
                            <?php esc_html_e( 'General Options Options', 'flight-booking' ); ?>                            
                       	</div>
                        <div class="flight-booking-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=flight_booking_preloader_setting') ); ?>"><?php esc_html_e('Go to General Options', 'flight-booking'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Post General Options >> Then go to different settings which ever you want >> Then Publish ', 'flight-booking' ); ?></p>
                	</div>
                	
                	<a target="_blank" href="<?php echo esc_url( FLIGHT_BOOKING_BUY_NOW ); ?>" class="flight-booking-theme-setting-item flight-booking-theme-setting-item-unavailable">
					    <div class="flight-booking-theme-setting-item-header">
					        <span><?php esc_html_e("Customize All Fonts", "flight-booking"); ?></span> <span><?php esc_html_e("Premium", "flight-booking"); ?></span>
					    </div>
					    <div class="flight-booking-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "flight-booking"); ?></span>
					    </div>
					</a>

					<a target="_blank" href="<?php echo esc_url( FLIGHT_BOOKING_BUY_NOW ); ?>" class="flight-booking-theme-setting-item flight-booking-theme-setting-item-unavailable">
					    <div class="flight-booking-theme-setting-item-header">
					        <span><?php esc_html_e("Customize All Color", "flight-booking"); ?></span> <span><?php esc_html_e("Premium", "flight-booking"); ?></span>
					    </div>
					    <div class="flight-booking-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "flight-booking"); ?></span>
					    </div>
					</a>

					<a target="_blank" href="<?php echo esc_url( FLIGHT_BOOKING_BUY_NOW ); ?>" class="flight-booking-theme-setting-item flight-booking-theme-setting-item-unavailable">
					    <div class="flight-booking-theme-setting-item-header">
					        <span><?php esc_html_e("Section Reorder", "flight-booking"); ?></span> <span><?php esc_html_e("Premium", "flight-booking"); ?></span>
					    </div>
					    <div class="flight-booking-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "flight-booking"); ?></span>
					    </div>
					</a>

					<a target="_blank" href="<?php echo esc_url( FLIGHT_BOOKING_BUY_NOW ); ?>" class="flight-booking-theme-setting-item flight-booking-theme-setting-item-unavailable">
					    <div class="flight-booking-theme-setting-item-header">
					        <span><?php esc_html_e("Typography Options", "flight-booking"); ?></span> <span><?php esc_html_e("Premium", "flight-booking"); ?></span>
					    </div>
					    <div class="flight-booking-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "flight-booking"); ?></span>
					    </div>
					</a>

					<a target="_blank" href="<?php echo esc_url( FLIGHT_BOOKING_BUY_NOW ); ?>" class="flight-booking-theme-setting-item flight-booking-theme-setting-item-unavailable">
					    <div class="flight-booking-theme-setting-item-header">
					        <span><?php esc_html_e("One Click Demo Import", "flight-booking"); ?></span> <span><?php esc_html_e("Premium", "flight-booking"); ?></span>
					    </div>
					    <div class="flight-booking-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "flight-booking"); ?></span>
					    </div>
					</a>
					<a target="_blank" href="<?php echo esc_url( FLIGHT_BOOKING_BUY_NOW ); ?>" class="flight-booking-theme-setting-item flight-booking-theme-setting-item-unavailable">
					    <div class="flight-booking-theme-setting-item-header">
					        <span><?php esc_html_e("Background  Settings", "flight-booking"); ?></span> <span><?php esc_html_e("Premium", "flight-booking"); ?></span>
					    </div>
					    <div class="flight-booking-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "flight-booking"); ?></span>
					    </div>
					</a>
					
				</div>
			</div>
		</div>
		<div id="righty">
			<div class="flight-booking-theme-setting-sidebar-item">
		        <div class="flight-booking-theme-setting-sidebar-header"><?php esc_html_e( 'Theme Bundle', 'flight-booking' ) ?></div>
		        <div class="flight-booking-theme-setting-sidebar-content">
		            <p class="m-0"><?php esc_html_e( 'Get our all themes in single pack.', 'flight-booking' ) ?></p>
		            <div id="admin_links">
		            	<a href="<?php echo esc_url( FLIGHT_BOOKING_BUNDLE ); ?>" target="_blank" class="blue-button-2"><?php esc_html_e( 'Theme Bundle', 'flight-booking' ) ?></a>
		            </div>
		        </div>
		    </div>
			<div class="flight-booking-theme-setting-sidebar-item">
		        <div class="flight-booking-theme-setting-sidebar-header"><?php esc_html_e( 'Free Documentation', 'flight-booking' ) ?></div>
		        <div class="flight-booking-theme-setting-sidebar-content">
		            <p class="m-0"><?php esc_html_e( 'Our guide is available if you require any help configuring and setting up the theme.', 'flight-booking' ) ?></p>
		            <div id="admin_links">
		            	<a href="<?php echo esc_url( FLIGHT_BOOKING_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Free Documentation', 'flight-booking' ) ?></a>
		            </div>
		        </div>
		    </div>
		    <div class="flight-booking-theme-setting-sidebar-item">
		        <div class="flight-booking-theme-setting-sidebar-header"><?php esc_html_e( 'Support', 'flight-booking' ) ?></div>
		        <div class="flight-booking-theme-setting-sidebar-content">
		            <p class="m-0"><?php esc_html_e( 'Visit our website to contact us if you face any issues with our lite theme!', 'flight-booking' ) ?></p>
		            <div id="admin_links">
		            	<a class="blue-button-2" href="<?php echo esc_url( FLIGHT_BOOKING_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'flight-booking' ) ?></a>
		            </div>
		        </div>
		    </div>
		    <div class="flight-booking-theme-setting-sidebar-item">
		        <div class="flight-booking-theme-setting-sidebar-header"><?php esc_html_e( 'Review', 'flight-booking' ) ?></div>
		        <div class="flight-booking-theme-setting-sidebar-content">
		            <p class="m-0"><?php esc_html_e( 'Are you having fun with Flight Booking? Review us on WordPress.org to show your support!', 'flight-booking' ) ?></p>
		            <div id="admin_links">
		            	<a href="<?php echo esc_url( FLIGHT_BOOKING_REVIEW_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Review', 'flight-booking' ) ?></a>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
<?php } ?>