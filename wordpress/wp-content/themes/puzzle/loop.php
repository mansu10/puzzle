<?php 

/**
 * 循环出所有文章
 *
 *
 *
 */
?>
<?php $count = 0; ?>
<?php while ( have_posts() ) : the_post();
?>
<div class="item-box">
	<a href="<?php the_permalink(); ?>" target="_blank">
		<?php if ( function_exists( 'the_post_thumbnail' ) ) { 
        	the_post_thumbnail( array(205,205) ); 
	     } ?>
		<?php echo get_the_excerpt(); ?>
	</a>
	
	<ul class="item-caption">
		<li><span class="fa fa-heart"></span></li>
		<li><span class="fa fa-share"></span></li>
		<li><span class="fa fa-star"></span></li>
	</ul>
</div>


<?php
endwhile;?>
