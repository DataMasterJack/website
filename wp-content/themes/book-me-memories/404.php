<?php
/**
 *	The template for dispalying the archive.
 *
 *	@package WordPress
 *	@subpackage book-me-memories
 */
?>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<section id="blog">
				<div class="row row-404">
					<div class="col-md-2 text-right">
						<span class="error-code"><?php _e( '404', 'book-me-memories' ) ?></span>
					</div>
					<div class="col-md-10">
						<h2><?php _e( 'OOOPS!', 'book-me-memories' ) ?></h2>
						<p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet lorem ac orci dictum sodales et eget orci. Vestibulum a laoreet dolor. Sed finibus vulputate nisl, at pulvinar nisi commodo ac. Proin placerat auctor libero. Phasellus nec suscipit mi, sed faucibus purus.', 'book-me-memories' ) ?></p>
						<a href="<?php echo site_url() ?>" class="button"><?php _e( 'Home', 'book-me-memories' ) ?></a>
					</div>
				</div>
			</section><!--/#blog-->
		</div><!--/.col-sm-7-->
	</div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>