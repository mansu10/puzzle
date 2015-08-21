<?php
/*
Template Name: 拼图详情模板
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
	<section class="content-wrapper">
		<div class="main-content">
			<div class="nav-tabs">
				<div class="tabs-title">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_tags('标签：', ', ', ''); ?> &bull; <?php the_time('Y年n月j日') ?> &bull; <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?><?php edit_post_link('编辑', ' &bull; ', ''); ?></p>
				</div>
				<ul class="tabs-heading">
					<li data-url="<?php bloginfo('template_url'); ?>/public/product">Product</li>
					<li data-url="<?php bloginfo('template_url'); ?>/public/reviews">Reviews</li>
					<li data-url="<?php bloginfo('template_url'); ?>/public/discuss">Discuss</li>
					<li data-url="<?php bloginfo('template_url'); ?>/public/activities">Activities</li>
				</ul>
				<div class="tabs-content" id="loadhtml">loading...</div>
			</div>
		</div>
		<aside class="side-content">
			<div class="inner-block">
				<div class="sales">
					<button class="btn">淘宝链接</button>
					<?php echo wp_get_attachment_url(1); ?>
				</div>
				
			</div>
			<div class="inner-block">
				<ul class="preference">
					<li><i class="fa fa-heart"></i>like</li>
					<li>own</li>
					<li>share</li>
					<li>add to list</li>
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