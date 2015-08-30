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
	function init() {
		//初始化字段
		//初始化cookie
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
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				userid 
				UNIQUE KEY id (id)
			)ENGINE= MYISAM CHARACTER SET utf8;";
		require_once(ABSPATH.'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		}
	}	
	/**
	* 添加记录
	* 
	* @param
	* @return
	* 
	 */
	function add_list() {

	}

	/**
	* 获取列表
	* 
	* @param string
	* @return
	* 
	 */
	function get_list() {

	}

	/**
	* 设定列表
	* 
	* @param string
	* @return
	* 
	 */
	function set_list() {

	}

	/**
	* 更新总数
	* 
	* @param
	* @return
	* 
	 */
	function update_count() {

	}		

	/**
	* 处理request
	* 
	* @param
	* @return
	* 
	 */
	function deal_request() {

	}
}

 ?>