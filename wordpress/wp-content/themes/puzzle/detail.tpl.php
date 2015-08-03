<?php
/*
Template Name: 拼图详情模板
*/
?>
<?php get_header(); ?>
<?php the_content(); ?>

	<section class="content-wrapper">
		<div class="main-content">
			<div class="nav-tabs">
				<div class="tabs-title">
					<h3>Product Name</h3>
					<p>some description goes here or labels for its</p>
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

<?php get_footer(); ?>