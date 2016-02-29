<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_all(){
		
		// 取query
		$query = new MongoDB\Driver\Query([], ['limit'=>get('page')*get('skip'), 'skip'=>get('skip')]);
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Er_User, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_id(){
		
		// 取query
		$query = query_from_id(get('id'));
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Er_User, $query);
		return $result;
	}
	
	/**
	 * 编辑
	 */
	public function put_id(){
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['_id'=>create_id(get('id'))], ['$set'=>['feedback.'.post("index").'.content'=>post('content')]], ['multi' => false, 'upsert' => false]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Er_User, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>