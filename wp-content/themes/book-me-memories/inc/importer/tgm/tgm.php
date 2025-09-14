<?php require get_template_directory() . '/inc/importer/tgm/class-tgm-plugin-activation.php';

function flight_booking_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'flight-booking' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'flight_booking_register_recommended_plugins' );