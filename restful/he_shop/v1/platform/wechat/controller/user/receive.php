<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_receives(){
	
		// 取query
		$query = new MongoDB\Driver\Query(['uid'=>create_id(get('uid'))]);
	
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Er_Receive, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_index(){
	
		// 取query
		$query = new MongoDB\Driver\Query(['_id'=>create_id(get('id'))]);
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Er_Receive, $query);
		return $result;
	}
	
	/**
	 * 插入
	 */
	public function post_add(){
		
		// 取object
		$this->injection(MOD::$Er_Receive);
		$obj = json_decode(Er_Receive_Main);
		
		// 为obj赋值
		$obj->_id = create_id();
		$obj->uid = '';
		$obj->area = 0;
		$obj->name = '';
		$obj->mobile = '';
		$obj->address = '';
		
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['_id'=>create_id(get('uid'))], ['$push'=>$obj], ['multi' => true, 'upsert' => false]);
		
		// 插入
		Mongo::write(DB::$main, COL::$Er_Receive, $bulk);
		
		// 返回
		return '{"return": "OK"}';
	}


	/**
	 * 编辑
	 */
	public function put_id(){
		
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['_id'=>create_id(get('id'))], ['$set'=>['name'=>post('name')]], ['multi' => false, 'upsert' => false]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Er_Receive, $bulk);
	
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
		Mongo::write(DB::$main, COL::$Er_Receive, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>