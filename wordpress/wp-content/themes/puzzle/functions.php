<?php

//移除不必要head信息
remove_action('wp_head', 'wp_generator' ); //去除版本信息
remove_action('wp_head', 'wlwmanifest_link' );
remove_action('wp_head', 'rsd_link' );//清除离线编辑器接口
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//清除前后文信息
remove_action('wp_head', 'feed_links',2 );
remove_action('wp_head', 'feed_links_extra',3 );//清除feed信息
remove_action('wp_head', 'wp_shortlink_wp_head',10,0 );


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


require_once('control.php');

?>



