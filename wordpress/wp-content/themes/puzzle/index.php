<?php get_header(); ?>


	<section class="disp-wrapper">
		<div class="caption">
			<img src="<?php bloginfo('template_url'); ?>/img/img1.jpg" height="350" width="100%">
			<p>Hope Is A Good Thing.</p>
		</div>
		<div class="search">
			<span class="fa fa-search"></span>
			<input type="text" class="search-box">
		</div>
	</section>
	<section class="content-wrapper">
		<div class="main-content" id="waterfall">
			<?php get_template_part('loop', 'index'); ?>
		</div>
		<div class="side-content">
			<?php most_comm_posts(); ?>
			
			<div class="evaluation">
				<div class="half-row"><img src="<?php bloginfo('template_url'); ?>/img/1.jpg"></div>
				<div class="half-row"><img src="<?php bloginfo('template_url'); ?>/img/1.jpg"></div>
				<div class="half-row"><img src="<?php bloginfo('template_url'); ?>/img/1.jpg"></div>
				<div class="half-row"><img src="<?php bloginfo('template_url'); ?>/img/1.jpg"></div>
			</div>
			<div>
				<?php if ( function_exists('wp_tag_cloud') ) : ?>
				<ul>
					<li><?php wp_tag_cloud('smallest=15&largest=40&number=50&orderby=count'); ?></li>
				</ul>
				 
				<?php endif; ?>
			</div>
		</div>

	</section>

<?php get_footer(); ?>