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
<<<<<<< HEAD
				<ul class="preference">
					<li> <?php if( function_exists('zilla_likes') ) zilla_likes(); ?></li>
					<li>own</li>
					<li>share</li>
					<li>add to list</li>
=======
				<?php $admin_url=admin_url( 'admin-ajax.php' ); ?>

				<ul class="preference" id="favorite-list">
					<?php
					 $postid = get_the_ID();
					 list_view($postid); 
					 $check = is_user_logged_in();
					 if (!$check) {
					 	$check = 0;
					 }
					 ?>
					<!-- <li data-cata="like"><i class="fa fa-heart-o"></i><span>喜欢</span></li>
					<li data-cata="own"><i class="fa fa-circle-o"></i><span>拥有</span></li>
					<li>
						<i class="fa fa-share"></i><span>分享</span>
					</li>
					<li data-cata="list"><i class="fa fa-list"></i><span>愿望单</span></li> -->
>>>>>>> f427a1cb7bd8339d0284af13c4f85c65d41124c6
				</ul>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						var cata;
						var check = <?php echo $check; ?>;
						
						var fav = $('#favorite-list');
						fav.on('click', 'li', function(event) {
							event.preventDefault();
							cata = $(this).attr('data-cata');
							if (cata&&(check == 1)) {
								sendData(cata);
							} else {
								alert('log in please!');
								return;
							};
							$(this).find('>i').removeClass().addClass('fa fa-spinner fa-spin');
							// console.log(check);
							// console.log(typeof(check));

						});

						function sendData(el) {
							var data={
								action:'fav',
								type: el,
								// status: status,
								postid: <?php the_ID() ?>

							};
							$.post("<?php echo $admin_url;?>", data, function(res, status) {
								// console.log("<?php the_ID() ?>");
								// $('body').prepend(res);
								var fav = $('#favorite-list');
								fav.html(res);
							});							
						}
						
					});
				</script>
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