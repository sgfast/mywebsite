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
}

?>