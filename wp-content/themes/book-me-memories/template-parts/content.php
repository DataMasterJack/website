<?php
/**
 *    The template for dispalying the content.
 *
 * @package    WordPress
 * @subpackage book-me-memories
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-post-title"><?php the_title(); ?></a>
	<?php if ( has_post_thumbnail() ){ ?>
		<div class="blog-post-image">
			<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail( 'book-me-memories-blog-list' ); ?></a>
		</div><!--/.blog-post-image-->
	<?php }elseif ( get_theme_mod( 'book-me-memories_disable_random_featured_image' ) ) { ?>
		<div class="blog-post-image">
			<a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo book-me-memories_get_random_featured_image(); ?>"></a>
		</div><!--/.blog-post-image-->
	<?php } ?>
	<?php do_action( 'book-me-memories_archive_meta_content' ); ?>
	<div class="blog-post-entry">
		<?php the_excerpt(); ?>
	</div><!--/.blog-post-entry-->
	<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more', 'book-me-memories' ); ?>" class="blog-post-button"><?php _e( 'Read more', 'book-me-memories' ); ?></a>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->