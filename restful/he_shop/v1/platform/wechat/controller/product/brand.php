<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_all(){
		
		// 取query
		$query = query_all();
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Pt_Brand, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_id(){
		
		// 取query
		$query = query_from_id(get('id'));
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Pt_Brand, $query);
		return $result;
	}
}

?>