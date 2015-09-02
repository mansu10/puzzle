<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

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
<?php get_footer(); ?>