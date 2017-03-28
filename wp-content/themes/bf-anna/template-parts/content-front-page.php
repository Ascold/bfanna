<?php
/**
 * Template part for displaying content on front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BF_Anna
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-10 col-lg-offset-1'); ?>>
		<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bf-anna' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bf-anna' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
