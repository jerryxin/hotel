<?php

/*
 * group hotel_welcome
 * @author osbornyang
 * @package group
 * @copyright osbornyang
 * @version 1.2
 * @code-encode utf-8
 * @data-encode utf-8
*/

/*
 * create table tbl_hotel_welcome (id int unsigned primary key auto_increment, image_address text default null, welcome_info text default null, create_time TIMESTAMP NULL DEFAULT now());
 */

class db_hotel_welcome extends db_base {
	
	var $tbl_name = "tbl_hotel_welcome";

	function db_hotel_welcome() {
		parent::db_base();
	}

	/**
	 * 后台取单个数据
	 * @param int id
	 */
	function admin_get_item_by_id($id) {       
		//验证传入参数
		$id = intval($id);
		if (!$id) throw new Exception("DB:id错误！");
		//如果$id是字符串，并且在where条件中使用 ：$id = string::esc_mysql($id);
		
		//处理where条件
		$where = " id = {$id} ";	
		$data = $this->get_alllist($this->tbl_name, 1, 1, "", $where);
		
		return $data[0];
	}	
	
	//修改一条数据
	function admin_update_hotel_welcome_info_by_id($id, $image_address, $welcome_info) {
		global $config;

		//检查字段
		$id = intval($id);
		if (!$id) throw new Exception("DB:id有错误！");
		//如果id是字符串，并且在where条件中使用 ：$id = string::esc_mysql($id);
		
		//详细字段
		$ary = array();
		$ary["image_address"] = $image_address;
		$ary["welcome_info"] = $welcome_info;
		
		$ary["create_time"] = Date::get_date_time();
		
		$where = " id = $id ";
		$ret = $this->update($this->tbl_name, $ary, $where);
		if ($ret) {
			$memcache = mem_cache::get_instance();
			$key[] = "need to delete";
			$memcache->delete_ary($key);
		} else {
			return false;
		}

		return $ret;
	}
	//添加一条数据
	function admin_insert_hotel_welcome_info($image_address, $welcome_info) {
		global $config;
		
		// Keep only one recode in the database
		$this->delete($this->tbl_name, "id > 0");
		
		//详细字段
		$ary = array();
		$ary["image_address"] = $image_address;
		$ary["welcome_info"] = $welcome_info;
		
		$ary["create_time"] = Date::get_date_time();
		
		$ret = $this->insert($this->tbl_name, $ary);
		if ($ret) {
			$memcache = mem_cache::get_instance();
			$key[] = "need to delete";
			$memcache->delete_ary($key);
		} else {
			return false;
		}

		return $this->get_lastinsertid();
	}
	
	// 删除一条数据
	function admin_del_hotel_welcome_info_by_id($id) {
		global $config;
	
		//检查字段
		$id = intval($id);
		if (!$id) throw new Exception("DB:id有错误！");

		$where = " id = $id ";
		$ret = $this->delete($this->tbl_name, $where);
		
		return $ret;
	}
	
	function admin_get_list($p = 1, $pcount = 20) {     
		//验证传入参数
		$data = $this->get_alllist($this->tbl_name, $p, $pcount, "id desc");
		
		return $data;
	}	
	
	function admin_get_count() {       

		//验证传入参数
		$data = $this->get_listcount($this->tbl_name);
		
		return $data;
	}
	
}

?>
