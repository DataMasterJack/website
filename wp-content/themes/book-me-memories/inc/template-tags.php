<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package flight-booking
 */
if ( ! function_exists( 'flight_booking_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function flight_booking_posted_on() {
	$flight_booking_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$flight_booking_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$flight_booking_time_string = sprintf( $flight_booking_time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$flight_booking_posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'flight-booking' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $flight_booking_time_string . '</a>'
	);

	$flight_booking_byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'flight-booking' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $flight_booking_posted_on . '</span><span class="byline"> ' . $flight_booking_byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'flight_booking_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function flight_booking_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$flight_booking_categories_list = get_the_category_list( esc_html__( ', ', 'flight-booking' ) );
		if ( $flight_booking_categories_list && flight_booking_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'flight-booking' ) . '</span>', $flight_booking_categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$flight_booking_tags_list = get_the_tag_list( '', esc_html__( ', ', 'flight-booking' ) );
		if ( $flight_booking_tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'flight-booking' ) . '</span>', $flight_booking_tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'flight-booking' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'flight-booking' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function flight_booking_categorized_blog() {
	if ( false === ( $flight_booking_all_the_cool_cats = get_transient( 'flight_booking_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$flight_booking_all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$flight_booking_all_the_cool_cats = count( $flight_booking_all_the_cool_cats );

		set_transient( 'flight_booking_categories', $flight_booking_all_the_cool_cats );
	}

	if ( $flight_booking_all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so flight_booking_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so flight_booking_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in flight_booking_categorized_blog.
 */
function flight_booking_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'flight_booking_categories' );
}
add_action( 'edit_category', 'flight_booking_category_transient_flusher' );
add_action( 'save_post',     'flight_booking_category_transient_flusher' );

/**
 * Register Google fonts for flight-booking.
 */

function flight_booking_enqueue_google_fonts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
	
	wp_enqueue_style( 'google-fonts-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap' );

}
add_action( 'wp_enqueue_scripts', 'flight_booking_enqueue_google_fonts' );

// Logo, Title, Description
if ( ! function_exists( 'flight_booking_logo_title_description' ) ) :
function flight_booking_logo_title_description() {
		if(has_custom_logo())
		{	
			the_custom_logo();
		}
	?>  
	    <?php  if ( get_theme_mod( 'flight_booking_site_title_setting', true ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h2 class="site-title"><?php echo esc_html(get_bloginfo('name')); ?></h2>
			</a>
		<?php endif; ?>
	<?php
	    if ( get_theme_mod( 'flight_booking_tagline_setting', false ) ) :
			$flight_booking_description = get_bloginfo( 'description');
			if ($flight_booking_description) : ?>
				<p class="site-description"><?php echo esc_html($flight_booking_description); ?></p>
		<?php endif; ?>
	<?php endif;
} 
endif;
?>