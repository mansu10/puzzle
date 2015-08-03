<?php
/*
Template Name: 论坛模板
*/
?>
<?php get_header(); ?>
<?php the_content(); ?>
	<div class="forum-wrapper">
		<section class="board">
			<div class="forum-title">
				<span class="fa fa-star"></span>
				公告，人气贴
			</div>
		</section>
		<section class="plates">
			<div class="forum-title"><span class="fa fa-star"></span>论坛板块</div>
			<ul>
				<li>
					<figure class="plate-logo">
						<a href=""><img src="<?php bloginfo('template_url'); ?>/img/avatar.png"></a>
					</figure>
					<section class="plate-desc">
						a short description about this part
					</section>
				</li>
				<li>
					<figure class="plate-logo">
						<a href=""><img src="<?php bloginfo('template_url'); ?>/img/avatar.png"></a>
					</figure>
					<section class="plate-desc">
						a short description about this part
					</section>
				</li>
				<li>
					<figure class="plate-logo">
						<a href=""><img src="<?php bloginfo('template_url'); ?>/img/avatar.png"></a>
					</figure>
					<section class="plate-desc">
						a short description about this part
					</section>
				</li>
				<li>
					<figure class="plate-logo">
						<a href=""><img src="<?php bloginfo('template_url'); ?>/img/avatar.png"></a>
					</figure>
					<section class="plate-desc">
						a short description about this part
					</section>
				</li>
			</ul>
		</section>
		<section class="member-info">
			<div class="forum-title"><span class="fa fa-star"></span>something like total members, activies members</div>
			
		</section>
	</div>

<?php get_footer(); ?>