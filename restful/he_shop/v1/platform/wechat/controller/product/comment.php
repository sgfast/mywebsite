<?php

class MyController extends Controller{
	
	/**
	 * 获取某一商品的所有评论
	 */
	public function get_pid(){
	
		// 取query
		$query = new MongoDB\Driver\Query(['pid'=>get('pid')], ['sort'=>array('time'=>-1)]);
	
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Pt_Comment, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_id(){
		
		// 取query
		$query = query_from_id(get('id'));
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Pt_Comment, $query);
		return $result;
	}
	
	/**
	 * 插入
	 */
	public function post_add(){
	
		// 取object
		$this->injection(MOD::$Pt_Comment);
		$obj = json_decode(Pt_Comment_Main);
	
		// 为obj赋值
		$obj->_id = create_id();
		$obj->pid = '';
		$obj->uid = '';
		$obj->start = '';
		$obj->ip = '';
		$obj->time = 0;
		$obj->content = '';
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->insert($obj);
	
		// 插入
		Mongo::write(DB::$main, COL::$Pt_Comment, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
	
	/**
	 * 删除
	 */
	public function delete_id(){
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->delete(['_id'=>create_id(get('id'))]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Pt_Comment, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>