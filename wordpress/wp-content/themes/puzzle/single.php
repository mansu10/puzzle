<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package
 * @subpackage
 * @since
 */

?>
<?php get_header(); ?>
	<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
	<section class="content-wrapper">
		<div class="main-content">
			<?php get_template_part('content', 'index') ?>
		</div>
		<aside class="side-content">
			<div class="inner-block">
				<div class="sales">
					<button class="btn">淘宝链接</button>
				</div>
				
			</div>
			<div class="inner-block">
				<ul class="preference">
					<li> <?php if( function_exists('zilla_likes') ) zilla_likes(); ?></li>
					<li><i class="fa fa-circle"></i>own</li>
					<li>
						<i class="fa fa-share"></i>share
					</li>
					<li><i class="fa fa-list"></i><?php if (function_exists('wpfp_link')) { wpfp_link(); } ?></li>
				</ul>
			</div>
			<div class="inner-block" id="label-cloud">
				
			</div>
		</aside>
	</section>
<?php else : ?>
<div class="errorbox">
	没有文章！
</div>	
<?php endif; ?>
<?php get_footer(); ?>