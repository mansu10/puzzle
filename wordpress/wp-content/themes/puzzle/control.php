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
	#add_action('admin_menu','contentManage');
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
			'收藏管理',			//页面title
			'收藏管理',			//菜单名称
			10,	//菜单权限
			'contentManage',	//地址栏名
			'indexManageView',	//回调函数
			'',					//图片参数
			9					//菜单放置位置
		);
	//添加子菜单
	add_submenu_page('contentManage','喜欢列表','主页管理',8,'contentManage','indexManageView');
	add_submenu_page('contentManage','详情页管理','详情页管理',8,'detail_manage','detailManageView');
}


//activity 状态
function showActivity($postid){
	global $wpdb;
	$table_name = $wpdb->prefix.'favorite';
	$table_user = $wpdb->prefix.'users';
	$result = $wpdb->get_results("SELECT * FROM $table_name WHERE postid='$postid' ORDER BY post_date DESC LIMIT 20");
	$res = array();
	for ($i=0; $i < count($result); $i++) { 
    	foreach ($result[$i] as $key => $value) {

    		switch ($key) {
    			case 'userid':
    			$e = "SELECT user_nicename FROM ".$table_user." WHERE ID=".$value."";
    				$r = $wpdb->get_row("SELECT user_nicename FROM ".$table_user." WHERE ID=".$value."");
    				$user_name = $r->{'user_nicename'};
    				break;
    			case 'meta_key':
    				if ($value == 'like') {
    					$user_action = ' 喜欢了这张拼图';
    				}else if($value == 'own') {
    					$user_action = ' 已拥有这张拼图';
    				} else if ($value == 'list') {
    					$user_action = ' 添加拼图到愿望单';
    				}

    				break;
    			case 'post_date':
    				$post_date = $value;
    				break;
    			default:
    				# code...
    				break;
    		}
    		$data = '<article>
    					<section>'.$user_name.$user_action.'</section>
    					<footer>
    						<span>'.$post_date.'</span>
    					</footer>
    				</article>';

    	}
    	array_push($res, $data);
	}
	return $res;
	
}

 ?>