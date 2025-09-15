<?php
/**
 *    The template for dispalying the footer.
 *
 * @package    WordPress
 * @subpackage book-me-memories
 */
?>
<?php

if ( current_user_can( 'edit_theme_options' ) ) {
	$footer_copyright  = get_theme_mod( 'book-me-memories_footer_copyright', __( '&copy; Copyright 2016. All Rights Reserved.', 'book-me-memories' ) );
} else {
	$footer_copyright  = get_theme_mod( 'book-me-memories_footer_copyright' );
}
?>
<footer id="footer">
	<div class="container">
		<div class="row">
			<?php
			$the_widget_args = array(
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h5>',
				'after_title'   => '</h5></div>',
			);
			?>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php
				if ( is_active_sidebar( 'footer-sidebar-1' ) ):
					dynamic_sidebar( 'footer-sidebar-1' );
				elseif ( current_user_can( 'edit_theme_options' ) ):
					the_widget( 'WP_Widget_Text', 'title=' . __( 'Products', 'book-me-memories' ) . '&text=<ul><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Our work', 'book-me-memories' ) . '">' . __( 'Our work', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Club', 'book-me-memories' ) . '">' . __( 'Club', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'News', 'book-me-memories' ) . '">' . __( 'News', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Announcement', 'book-me-memories' ) . '">' . __( 'Announcement', 'book-me-memories' ) . '</a></li></ul>', $the_widget_args );
				endif;
				?>
			</div><!--/.col-sm-3-->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php
				if ( is_active_sidebar( 'footer-sidebar-2' ) ):
					dynamic_sidebar( 'footer-sidebar-2' );
				elseif ( current_user_can( 'edit_theme_options' ) ):
					the_widget( 'WP_Widget_Text', 'title=' . __( 'Information', 'book-me-memories' ) . '&text=<ul><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Pricing', 'book-me-memories' ) . '">' . __( 'Pricing', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Terms', 'book-me-memories' ) . '">' . __( 'Terms', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Affiliates', 'book-me-memories' ) . '">' . __( 'Affiliates', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Blog', 'book-me-memories' ) . '">' . __( 'Blog', 'book-me-memories' ) . '</a></li></ul>', $the_widget_args );
				endif;
				?>
			</div><!--/.col-sm-3-->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php
				if ( is_active_sidebar( 'footer-sidebar-3' ) ):
					dynamic_sidebar( 'footer-sidebar-3' );
				elseif ( current_user_can( 'edit_theme_options' ) ):
					the_widget( 'WP_Widget_Text', 'title=' . __( 'Support', 'book-me-memories' ) . '&text=<ul><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Documentation', 'book-me-memories' ) . '">' . __( 'Documentation', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'FAQs', 'book-me-memories' ) . '">' . __( 'FAQs', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Forums', 'book-me-memories' ) . '">' . __( 'Forums', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Contact', 'book-me-memories' ) . '">' . __( 'Contact', 'book-me-memories' ) . '</a></li></ul>', $the_widget_args );
				endif;
				?>
			</div><!--/.col-sm-3-->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php
				if ( is_active_sidebar( 'footer-sidebar-4' ) ):
					dynamic_sidebar( 'footer-sidebar-4' );
				elseif ( current_user_can( 'edit_theme_options' ) ):
					the_widget( 'WP_Widget_Text', 'title=' . __( 'Support', 'book-me-memories' ) . '&text=<ul><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Documentation', 'book-me-memories' ) . '">' . __( 'Documentation', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'FAQs', 'book-me-memories' ) . '">' . __( 'FAQs', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Forums', 'book-me-memories' ) . '">' . __( 'Forums', 'book-me-memories' ) . '</a></li><li><a href="' . esc_url( '#' ) . '" title="' . __( 'Contact', 'book-me-memories' ) . '">' . __( 'Contact', 'book-me-memories' ) . '</a></li></ul>', $the_widget_args );
				endif;
				?>
			</div><!--/.col-sm-3-->
		</div><!--/.row-->
	</div><!--/.container-->
	<div class="bottom-footer">
		<div class="container">
			<p class="copyright">
				<span><?php printf( '%s <a href="%s" title="%s" target="_blank">%s</a>.', __( 'Theme:', 'book-me-memories' ), esc_url( 'http://bookmememories.com/wp/themes/book-me-memories' ), __( 'Book Me Memories', 'book-me-memories' ), __( 'Book Me Memories', 'book-me-memories' ) ); ?></span>
				<span class="bottom-copyright" data-customizer="copyright-credit"><?php echo book-me-memories_sanitize_html( $footer_copyright ); ?></span>
			</p>
		</div>
	</div>

<div class="payment-partner">Payment Partner: <img src="https://razorpay.com/favicon.png" alt="Razorpay" style="height:24px;"></div>
</footer><!--/#footer-->
<?php wp_footer(); ?>
</body>
</html>