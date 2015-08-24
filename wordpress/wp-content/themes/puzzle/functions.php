<?php

//移除不必要head信息
remove_action('wp_head', 'wp_generator' ); //去除版本信息
remove_action('wp_head', 'wlwmanifest_link' );
remove_action('wp_head', 'rsd_link' );//清除离线编辑器接口
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//清除前后文信息
remove_action('wp_head', 'feed_links',2 );
remove_action('wp_head', 'feed_links_extra',3 );//清除feed信息
remove_action('wp_head', 'wp_shortlink_wp_head',10,0 );

require_once('control.php');

// 移除不需要的菜单栏
function removeMenus() {
	global $menu;
	$restricted = array(__('Comments'),__('Tools'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(strpos($value[0], '<') === FALSE) {
			if(in_array($value[0] != NULL ? $value[0]:"" , $restricted)){
				unset($menu[key($menu)]);
			}
		}
		else {
			$value2 = explode('<', $value[0]);
			if(in_array($value2[0] != NULL ? $value2[0]:"" , $restricted)){
				unset($menu[key($menu)]);
			}
		}
	}
}

if (is_admin()) {
	add_action('admin_menu','removeMenus');
}

//注册工具栏
if (function_exists('register_sidebar')){
   register_sidebar(array(
		'name' => '小工具',
		'id'   => 'side',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div>'
	));
}


register_nav_menus(
	array(
	'nav-menu' => __( '主导航' )
));


//禁用更新提示
add_filter('pre_site_transient_update_core',    create_function('$a', "return null;")); // 关闭核心提示

add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;")); // 关闭插件提示

add_filter('pre_site_transient_update_themes',  create_function('$a', "return null;")); // 关闭主题提示

remove_action('admin_init', '_maybe_update_core');    // 禁止 WordPress 检查更新

remove_action('admin_init', '_maybe_update_plugins'); // 禁止 WordPress 更新插件

remove_action('admin_init', '_maybe_update_themes');  // 禁止 WordPress 更新主题

//官方Gravatar头像调用ssl头像链接
// function get_ssl_avatar($avatar) {
//    $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
//    return $avatar;
// }
// add_filter('get_avatar', 'get_ssl_avatar');

//更改后台管理界面字体


//屏蔽后台页脚信息
function change_footer_admin () {return '';}
add_filter('admin_footer_text', 'change_footer_admin', 9999);
function change_footer_version() {return '';}
add_filter( 'update_footer', 'change_footer_version', 9999);

//屏蔽左上logo
// function annointed_admin_bar_remove() {
//         global $wp_admin_bar;
//         /* Remove their stuff */
//         $wp_admin_bar->remove_menu('wp-logo');
// }
// add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

//excerpt被用作在首页上简略的文章信息
//此处设定显示的字符数
function new_excerpt_length($length) {
    return 100;
}
add_filter('excerpt_length', 'new_excerpt_length');


//使主页文章支持缩略图功能
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}
//抓取文章中的第一张图片
function catch_first_image() {
	global $post, $posts;
	$content = $post->post_content;  
   
    preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);  

    $n = count($strResult[1]);  

    if($n > 0){ // 如果文章内包含有图片，就用第一张图片做为缩略图  
        echo '<img src="'.$strResult[1][0].'" width="205" />';
    } else {
    	return;
    }
}

function catch_three_image() {
	global $post, $posts;
	$imgs = array();
	$content = $post->post_content;  
    preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER); 

	$imgs[0] = $strResult [1] [0];
	$imgs[1] = $strResult [1] [1];
	$imgs[2] = $strResult [1] [2];
	// if(empty($first_img)){
	// 	$first_img = get_bloginfo('template_url') . '/i/default.jpg';
	// }
	return $imgs;
}

function mansu_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
   ?>
	<div class="discussion-list">
		<article>
			<figure>
				<a href=""><img src="<?php bloginfo('template_url'); ?>/img/avatar.png" height="50" width="50"></a>
				<figcaption><?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?></figcaption>
			</figure>
			<section>
				<p><?php comment_text(); ?></p>
			</section>
			<footer>
				<span><?php echo get_comment_time('Y-m-d H:i'); ?></span>
				<span class="fa fa-share-alt"></span>
				<span class="fa fa-thumbs-up"></span>
			</footer>
		</article>
	</div>
   <?php
}


?>



