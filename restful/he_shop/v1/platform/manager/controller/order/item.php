<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_all(){
		
		// 取query
		//$query = query_all();
		$query = new MongoDB\Driver\Query(['oid'=>get('oid')]);
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Sp_Item, $query);
		return $result;
	}

}

?>