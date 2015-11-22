<div class="nav-tabs">
	<div class="tabs-title">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php the_tags('标签：', ', ', ''); ?> &bull; <?php the_time('Y年n月j日') ?> &bull; <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?><?php edit_post_link('编辑', ' &bull; ', ''); ?></p>
	</div>
	<ul class="tabs-heading" id="loadTitle">
		<li data-url="product">Product</li>
		<li data-url="reviews">Reviews</li>
		<li data-url="discuss">Discuss</li>
		<li data-url="activities">Activities</li>
	</ul>
	<div class="tabs-content" id="loadContent">
		<!-- 产品slider -->
		<div class="product tabs" id="product">
		    <div class="touchslider">
		        <div class="touchslider-viewport" style="width:700;overflow:hidden;margin:0 auto;height:400px;">
		            <div>
		            	<?php
		            		//设定自定义图片
		            		$imgs = get_post_meta($post->ID, 'slider_img', $single=false);
		            		foreach ($imgs as $img) {
		            		?>
		            		<div class="touchslider-item">
			                    <img src="<?php echo $img ?>" alt="" width="700">
			                </div>
		            		<?php
		            		}

		            	 ?>
		                <!-- <div class="touchslider-item">
		                    <img src="http://fpoimg.com/700x400?text=holder" alt="">
		                </div>
		                <div class="touchslider-item">
		                    <img src="http://fpoimg.com/700x400?text=Second" alt="">
		                </div>
		                <div class="touchslider-item">
		                    <img src="http://fpoimg.com/700x400?text=Third" alt="">
		                </div> -->
		            </div>
		        </div>

		        <div class="touchslider-nav">
		            <span class="touchslider-prev fa fa-chevron-left"></span>
		            <span class="touchslider-nav-item touchslider-nav-item-current"></span>
		            <span class="touchslider-nav-item"></span>
		            <span class="touchslider-nav-item"></span>
		            <span class="touchslider-next fa fa-chevron-right"></span>
		        </div>
		    </div>
		    <div class="description">
		    	<?php the_content(); ?>
		    </div>
		</div>
		<!-- reviews -->
		<div class="reviews tabs" id="reviews" data-review=<?php echo $post->ID; ?>>
			<div class="add-comment">
				<!-- 部署之后需要根据情况更改 -->
				<a class="btn" href="http://localhost/puzzle/wordpress/?p=150&reviewid=<?php  echo $post->ID;?>">写评测</a>
				<!-- end -->
			</div>
			<?php 
				$post_id = $post->ID;
				$posts_list = get_origin_post_id($post_id);
				//var_dump($posts_list);
				if ($posts_list) {
					foreach ($posts_list as $review_post) {
						$post_detail = get_post($review_post->post_id);
						//var_dump($review_post->post_id);
						//var_dump($post_detail);

						?>
						<article class="comment-wrapper">
							<figure>
								<a href="#" class="avatar"><?php echo get_avatar($post_detail->post_author,39); ?></a>
								<figcaption><?php echo the_author_meta('user_nicename',$post_detail->post_author ); ?></figcaption>
							</figure>
							<header>
								<?php echo $post_detail->post_title ?>
							</header>
							<section>
								<?php echo $post_detail->post_content ?>
							</section>
							<footer>
								<!-- <div class="addon-func">
									<span class="fa fa-heart"></span><span>25</span>
									<span class="fa fa-thumbs-up"></span><span>15</span>	
								</div> -->
								<div class="post-time">
									<?php echo $post_detail->post_modified ?>
								</div>
							</footer>
						</article>

						<?php
					}
				}else{
					echo "没有相关评测";
				}
			 ?>
<!-- 			<article class="comment-wrapper">
				<figure>
					<a href="#" class="avatar"><img src="<?php bloginfo('template_url'); ?>/img/avatar.png"></a>
					<figcaption>User Name</figcaption>
				</figure>
				<header>
					What about this?
				</header>
				<section>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</section>
				<footer>
					<div class="addon-func">
						<span class="fa fa-heart"></span><span>25</span>
						<span class="fa fa-thumbs-up"></span><span>15</span>	
					</div>
					<div class="post-time">
						2015-07-22 21:55
					</div>
				</footer>
			</article> -->

		</div>
		<!-- dicuss -->
		<div class="discuss tabs" id="discuss">
			<?php comments_template(); ?>
		</div>
		<!-- activities -->
		<div class="activities tabs" id="activities">
			<div class="discussion-list">
				<?php 
					$res = showActivity($post->ID); 
					//var_dump($res);
					foreach ($res as $key => $value) {
						echo $value;
					}
				?>
				<!-- <article>
					<figure>
						<a href="" title=""><img src="<?php bloginfo('template_url'); ?>/img/avatar.png" height="50" width="50"></a>
						<figcaption>Name</figcaption>
					</figure>
					<section>Activities goes here</section>
					<footer>
						<span>post time</span>
					</footer>
				</article> -->
			</div>
		</div>					
	</div>
</div>