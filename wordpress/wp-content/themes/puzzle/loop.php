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
		$id = $post->ID;
		$user_id = get_post($id)->post_author;
		if(user_can($user_id,'edit_others_posts')){
?>
<div class="item-box">
	<a href="<?php the_permalink(); ?>" target="_blank">
		<?php if ( has_post_thumbnail() ) { 
        	the_post_thumbnail( array(205,205) ); 
	     } else { catch_first_image(); } ?>
	    <?php //catch_thumbnail(); ?>
		<?php echo get_the_excerpt(); ?>
	</a>

	<!-- JiaThis Button BEGIN -->
	<div class="jiathis_style item-caption" >
		<a class="jiathis_button_qzone"></a>
		<a class="jiathis_button_tsina"></a>
		<a class="jiathis_button_weixin"></a>
		<a class="jiathis_button_tqq"></a>
		<a class="jiathis_button_renren"></a>
		<!-- <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a> -->
	</div>
	<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
	<!-- JiaThis Button END -->
</div>


<?php
}
endwhile;?>
