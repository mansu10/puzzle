<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

 get_header(); ?>

	<div id="primary" class="forum-wrapper">

		<div id="content" role="main">
         
			<?php while ( have_posts() ) : the_post(); ?>

				<?php #get_template_part( 'content1', 'page' ); ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

	</div><!-- #primary -->
<div class="entry-content forum-wrapper">
	<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>
	<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
</div><!-- .entry-content -->
<?php get_footer(); ?>