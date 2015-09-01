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
		<?php if ( has_post_thumbnail() ) { 
        	the_post_thumbnail( array(205,205) ); 
	     } else { catch_first_image(); } ?>
	    <?php //catch_thumbnail(); ?>
		<?php echo get_the_excerpt(); ?>
	</a>
	
	<ul class="item-caption">
		<li> share </li>
		<li> share </li>
		<li> share </li>
	</ul>
</div>


<?php
endwhile;?>
