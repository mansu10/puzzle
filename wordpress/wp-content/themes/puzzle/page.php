<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

 get_header(); ?>

	<div id="primary" class="forum-wrapper"></div><!-- #primary -->
	<div id="content" role="main">
	 	<?php 
	 		
	 		if (isset($_GET['reviewid'])){
	 			$reviewid = $_GET['reviewid'];
	 		}else{
	 			$reviewid = '';
	 		}
	 		while ( have_posts() ) : the_post();
	 		#the_content();
	 		endwhile;
	 	 ?>
	 	 <script type="text/javascript">
	 	 	window.onload = function(){
	 	 		var ele = document.getElementById('targetpost');
	 	 		ele.value = <?php echo $reviewid ?>
	 	 	}
	 	 </script>
	</div><!-- #content -->
<div class="entry-content forum-wrapper">
	<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>
	<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
</div><!-- .entry-content -->
<?php get_footer(); ?>

