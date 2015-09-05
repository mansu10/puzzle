<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

 get_header(); ?>

	<div id="primary">

			<div id="content" role="main">
             
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content1', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>