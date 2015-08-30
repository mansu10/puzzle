<?php 

/**
* 喜欢，拥有，想要功能类
*/
class Favorite
{
	/**
	* 初始化参数设置
	* 为用户表的当前用户添加三种字段
	* @param void
	* @return mixed
	* 
	 */
	function init($type, $status, $postid) {
		if ($status == '1') {
			$this->add_list($type, $postid);
		} else if ($status == '0') {
			$this->remove_list();
		}

	}

	/**
	* 添加记录
	* 
	* @param
	* @return
	* 
	 */
	function add_list($data, $postid) {
		global $wpdb;
		$table_name = $wpdb->prefix.'favorite';
		$userid = $this->get_user_id();
		$dbvalue = array();

		$dbvalue['userid'] = $userid;
		$dbvalue['postid'] = $postid;
		$dbvalue['meta_key'] = $data;

		$check = $wpdb->get_var("SELECT count(*) FROM $table_name WHERE meta_key='$data' AND postid='$postid' AND userid='$userid'" );
		if ($check) {
			return;
		}

		$wpdb->insert($table_name, $dbvalue);

		$count = $wpdb->get_var("SELECT count(*) FROM $table_name WHERE meta_key='$data' AND postid='$postid'" );

		update_post_meta($postid, '_list'.$data, $count);
	}

	/**
	* 添加记录
	* 
	* @param
	* @return
	* 
	 */
	function remove_list() {

	}
	
	function get_user_id() {
		global $current_user;
		get_currentuserinfo();
		return $current_user->ID;
	}
}


/**
* 构建数据库表
* 
* @param
* @return
* 
 */
function create_db_table() {
	global $wpdb;
	$table_name = $wpdb->prefix.'favorite';//表前缀
	if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
		$sql = "CREATE TABLE ".$table_name."(
			id int(11) NOT NULL AUTO_INCREMENT,
			userid bigint(20) NOT NULL,
			postid bigint(20) NOT NULL,
			meta_key varchar(255),
			meta_value longtext,
			UNIQUE KEY id (id)
		)ENGINE= MYISAM CHARACTER SET utf8;";
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	}
}
add_action('admin_init', 'create_db_table');

function deal_request() {
	global $wpdb, $post;
	$type = $_POST['type'];
	$status = $_POST['status'];
	$postid = $_POST['postid'];

	$fav = new Favorite;
	$fav->init($type, $status, $postid);
}
add_action('wp_ajax_fav', 'deal_request');

function list_view() {
	global $wpdb;
	global $current_user;
	$table_name = $wpdb->prefix.'favorite';
	get_currentuserinfo();
	$userid = $current_user->ID;
	
	$postid = get_the_ID();
	$like = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE userid='$userid' AND postid='$postid' AND meta_key='like'");
	$own = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE userid='$userid' AND postid='$postid' AND meta_key='own'");
	$list = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE userid='$userid' AND postid='$postid' AND meta_key='list'");
	
	if (intval($like)>0) {
		echo '<li data-cata="like"><i class="fa fa-heart"></i><span>喜欢</span></li>';
	} else {
		echo '<li data-cata="like"><i class="fa fa-heart-o"></i><span>喜欢</span></li>';
	}
	if (intval($own)>0) {
		echo '<li data-cata="own"><i class="fa fa-circle"></i><span>拥有</span></li>';
	} else {
		echo '<li data-cata="own"><i class="fa fa-circle-o"></i><span>拥有</span></li>';
	}
	echo '<li><i class="fa fa-share"></i><span>分享</span></li>';
	if (intval($list)>0) {
		echo '<li data-cata="list"><i class="fa fa-list"></i><span>愿望单</span></li>';
	} else {
		echo '<li data-cata="list"><i class="fa fa-list"></i><span>愿望单</span></li>';
	}

}
 ?>