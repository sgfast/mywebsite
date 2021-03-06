<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_uid(){
		
		// 取query
		$query = new MongoDB\Driver\Query(['uid'=>get('uid')], ['limit'=>get('page')*get('skip'), 'skip'=>get('skip')]);
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Er_Coupon, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_id(){
		
		// 取query
		$query = query_from_id(get('id'));
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Er_Coupon, $query);
		return $result;
	}
}

?>