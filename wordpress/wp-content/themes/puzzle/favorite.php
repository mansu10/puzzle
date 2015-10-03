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
			$this->oper_list($type, $postid);
		}

	}

	/**
	* 添加记录
	* 
	* @param
	* @return
	* 
	 */
	function oper_list($data, $postid) {
		global $wpdb;
		$table_name = $wpdb->prefix.'favorite';
		$userid = $this->get_user_id();
		date_default_timezone_set('PRC');
		$date = date('Y-m-d H:i:s', time());
		$dbvalue = array();

		$dbvalue['userid'] = $userid;
		$dbvalue['postid'] = $postid;
		$dbvalue['meta_key'] = $data;
		$dbvalue['post_date'] = $date;

		$check = $wpdb->get_var("SELECT count(*) FROM $table_name WHERE meta_key='$data' AND postid='$postid' AND userid='$userid'" );
		if ($check > 0) {
			$wpdb->query("DELETE FROM $table_name WHERE  meta_key='$data' AND postid='$postid' AND userid='$userid'");
		} else {
			$wpdb->insert($table_name, $dbvalue);
		}

		$count = $wpdb->get_var("SELECT count(*) FROM $table_name WHERE meta_key='$data' AND postid='$postid'" );

		update_post_meta($postid, '_list'.$data, $count);

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
			post_date datetime,
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
	$postid = $_POST['postid'];
	$status = 1;
	$fav = new Favorite;
	$fav->init($type, $status, $postid);
	list_view($postid);
	die();
}
add_action('wp_ajax_fav', 'deal_request');

function list_view($postid) {
	global $wpdb;
	global $current_user;
	$table_name = $wpdb->prefix.'favorite';
	get_currentuserinfo();
	$userid = $current_user->ID;
	
	$postid = $postid;
	$like = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE userid='$userid' AND postid='$postid' AND meta_key='like'");
	$own = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE userid='$userid' AND postid='$postid' AND meta_key='own'");
	$list = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE userid='$userid' AND postid='$postid' AND meta_key='list'");
	$sumown = get_post_meta($postid, '_listown', true);
	$sumlike = get_post_meta($postid, '_listlike', true);
	if (intval($like)>0) {
		echo '<li data-cata="like"><i class="fa fa-heart"></i><span>已喜欢('.$sumlike.')</span></li>';
	} else {
		echo '<li data-cata="like"><i class="fa fa-heart-o"></i><span>喜欢('.$sumlike.')</span></li>';
	}
	if (intval($own)>0) {
		echo '<li data-cata="own"><i class="fa fa-circle"></i><span>已拥有('.$sumown.')</span></li>';
	} else {
		echo '<li data-cata="own"><i class="fa fa-circle-o"></i><span>拥有('.$sumown.')</span></li>';
	}
	echo '<li><i class="fa fa-share"></i><span>分享</span></li>';
	if (intval($list)>0) {
		echo '<li data-cata="list"><i class="fa fa-list"></i><span>已添加</span></li>';
	} else {
		echo '<li data-cata="list"><i class="fa fa-list"></i><span>愿望单</span></li>';
	}
}

function fav_list_pages() {
    add_menu_page('fav page', '收藏列表', 1, 'content_page', 'like_list');
    add_submenu_page('content_page','喜欢列表','喜欢列表',1,'content_page','like_list');
    add_submenu_page('content_page','拥有管理','拥有管理',1,'own_list','own_list');
    add_submenu_page('content_page','愿望单','愿望单',1,'want_list','want_list');
}
function like_list() {
	$fav_like = new DisplayFavList();
	$fav_like->prepare_items('like'); ?>
	<div class="wrap">
		<h2>喜欢列表</h2>
		<form method="post">
			<input type="hidden" name="page" value="">
			<?php $fav_like->search_box('搜索', 'search_id'); ?>
		
			<?php $fav_like->display(); ?>
		</form>
		
	</div>
<?php	
}
function want_list() {
	$fav_list = new DisplayFavList();
	$fav_list->prepare_items('list'); ?>
	<div class="wrap">
		<h2>愿望单</h2>
		<form method="post">
			<input type="hidden" name="page" value="">
			<?php $fav_list->search_box('搜索', 'search_id'); ?>
		
			<?php $fav_list->display(); ?>
		</form>
		
	</div>
<?php
}
function own_list() {
	$fav_own = new DisplayFavList();
	$fav_own->prepare_items('own'); ?>
	<div class="wrap">
		<h2>拥有列表</h2>
		<form method="post">
			<input type="hidden" name="page" value="">
			<?php $fav_own->search_box('搜索', 'search_id'); ?>
		
			<?php $fav_own->display(); ?>
		</form>
		
	</div>
<?php

}
add_action('admin_menu', 'fav_list_pages');

/**
* 
*/
//引入系统列表类
if ( !class_exists('WP_List_Table')) {
	require_once( ABSPATH.'wp-admin/includes/class-wp-list-table.php' );
}
class DisplayFavList extends WP_List_Table 
{
	var $configMap = array(
		'total_items' => 1
	);
	
	public function prepare_items($param) {
		$columns = $this->get_columns();
		$hidden = $this->get_hidden_columns();
		$sortable = $this->get_sortable_columns();
		$data = $this->table_data($param);

		$current_page = $this->get_pagenum();
		$this->set_pagination_args( array(
			'total_items' => $this->configMap['total_items'],
			'per_page'    => 10
		) );

		$this->_column_headers = array( $columns, $hidden, $sortable );
		$this->items = $data;
	}


	public function get_columns() {
		$columns = array(
			'cb'      => '<input type="checkbox" />',
			'id'      => '序号',
			'title'   => '文章名',
			'url'	  => '查看'
		);
		return $columns;
	}
/**
     * 定义需要隐藏的列
     *
     * @return Array
     */
	public function get_hidden_columns(){
		return array();
	}

/**
     * 定义需要排序的列
     *
     * @return Array
     */
    public function get_sortable_columns(){
        return array(
        	'id'   => array('id', false)
        );
    }

/**
	* 添加全选功能
	*
	* @return String
	*/ 
	public function column_cb($item){
		return sprintf(
			'<input type="checkbox" name="person[]" value="%s"', $item['id']
		);
	}

/**
	* get_bulk_actions
	*
	* @return Array
	*/ 	
	public function get_bulk_actions(){
		$actions = array(
			'delete'    => '删除'
		);
		return $actions;
	}

/**
	* 数据库中获取数据
	*
	* @return Array
	*/
    public function table_data($param){
    	global $wpdb;
		global $current_user;
		$table_name = $wpdb->prefix.'favorite';
		$table_post = $wpdb->prefix.'posts';
		get_currentuserinfo();
		$userid = $current_user->ID;
    	$result = $wpdb->get_results("SELECT * FROM $table_name WHERE userid='$userid' AND meta_key='$param'");
    	$this->configMap['total_items'] = count($result);
    	// $data = object_to_array($result);
    	// echo var_dump($data);
    	// echo var_dump($result);
    	$data = array();
    	for ($i=0; $i < count($result); $i++) { 
    		$item = array();
	    	foreach ($result[$i] as $key => $value) {
	    		
	    		if ($key == 'postid') {
	    			$post_detail = $wpdb->get_row("SELECT guid,post_title FROM $table_post WHERE ID='$value'");
	    			// echo $post_detail['guid'];
	    			$item['url'] = $post_detail->{'guid'};
	    			$item['title'] = $post_detail->{'post_title'};
	    			// echo var_dump($item);
	    		}
	    		$item['id'] = $i+1;
	    	}
	    	array_push($data, $item);
    	}
    	// echo var_dump($data);
    	return $data;
    }

/**
	* 定义每列所呈现的数据
	*
	* @param Array $item Data
	* @param String $column_name Current column name
	*
	* @return Mixed
	*/ 
	public function column_default( $item, $column_name ){
		switch ( $column_name ) {
			case 'id':
			case 'title':
				return $item[ $column_name ];
			case 'url':
				return '<a href="'.$item[ $column_name ].'" alt="查看详细">查看详细</a>';
			default:
				return print_r( $item, true );
		}
	}
// 删除功能
// 升降序
}

 ?>