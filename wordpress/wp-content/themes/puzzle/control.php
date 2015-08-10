<?php 

/*--------------------------------------
*|-内容管理
*	|-主页管理
*	|-详情页管理
*			
*          								
* --------------------------------------
*/
require_once('include/indexManageView.php');
require_once('include/detailManageView.php');


$shortname = 'ms';
$indexOptions = array(
	array('name' => '', 'type' => '', 'desc' => '' ),
	array('name' => '', 'type' => '', 'desc' => '' )

);

$detailOptions = array(
	array('name' => '', 'type' => '', 'desc' => '' ),
	array('name' => '', 'type' => '', 'desc' => '' )

);


// 管理员界面绑定函数
if (is_admin()) {
	add_action('admin_menu','contentManage');
}

/**
 * 主界面添加内容管理子菜单
 * 
 * @param 
 *
 * @return Void
 *
 */ 
function contentManage(){
	add_menu_page(
			'内容管理',			//页面title
			'内容管理',			//菜单名称
			'administrator',	//菜单权限
			'contentManage',	//地址栏名
			'indexManageView',	//回调函数
			'',					//图片参数
			9					//菜单放置位置
		);
	//添加子菜单
	add_submenu_page('contentManage','主页管理','主页管理',8,'contentManage','indexManageView');
	add_submenu_page('contentManage','详情页管理','详情页管理',8,'detail_manage','detailManageView');
}




 ?>