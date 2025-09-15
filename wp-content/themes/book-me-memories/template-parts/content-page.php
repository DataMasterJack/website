<?php
/**
 *	The template for displaying the page content.
 *
 *	@package WordPress
 *	@subpackage book-me-memories
 */

$jumbotron_single_image  = get_theme_mod( 'book-me-memories_jumbotron_enable_featured_image', true );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<h1 class="blog-post-title"><?php the_title(); ?></h1>
	<?php if ( has_post_thumbnail() && $jumbotron_single_image != true ) { ?>
		<div class="blog-post-image">
			<?php the_post_thumbnail( 'book-me-memories-blog-list' ); ?>
		</div><!--/.blog-post-image-->
	<?php } ?>
	<div class="blog-post-entry markup-format">
		<?php
		the_content();

		wp_link_pages( array(
			'before'	=> '<div class="link-pages">' . __( 'Pages:', 'book-me-memories' ),
			'after'		=> '</div><!--/.link-pages-->'
		) );
		?>
	</div><!--/.blog-post-entry.markup-format-->
</article><!--/#post-<?php the_ID(); ?>.blog-post-->