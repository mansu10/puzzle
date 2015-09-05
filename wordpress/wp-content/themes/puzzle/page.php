<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

<<<<<<< HEAD
 get_header(); ?>

	<div id="primary">

			<div id="content" role="main">
             
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content1', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
=======
get_header(); ?>
<?php if ( is_bbpress() ) : ?>
<!-- 	<div class="forum-wrapper">
		<section class="board">
			<div class="forum-title">
				<span class="fa fa-star"></span>
				公告，人气贴，？
			</div>
		</section>
		<section class="plates">
			<div class="forum-title"><span class="fa fa-star"></span>论坛板块</div> -->
			<div id="bbpress-forums">
			<?php get_template_part('loop', 'forums'); ?>
			</div>
<!-- 		</section>
		<section class="member-info">
			<div class="forum-title"><span class="fa fa-star"></span>something like total members, activies members</div>
			
		</section>
	</div> -->
<?php endif ?>
>>>>>>> f427a1cb7bd8339d0284af13c4f85c65d41124c6
<?php get_footer(); ?>