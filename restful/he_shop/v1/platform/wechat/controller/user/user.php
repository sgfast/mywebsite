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
	 * 插入
	 */
	public function post_add(){
		
		// 取object
		$this->injection(MOD::$Er_User);
		$obj = json_decode(Er_User_Main);
		
		// 为obj赋值
		$obj->_id = new MongoDB\BSON\ObjectID();
		$obj->aid = 0;
		$obj->openid = '';
		$obj->nickname = '';
		$obj->mobile = '';
		$obj->email = '';
		$obj->thumb = '';
		$obj->point = 0;
		$obj->cash = 0;
		$obj->register = time();
		
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->insert($obj);
		
		// 插入
		Mongo::write(DB::$main, COL::$Er_User, $bulk);
		
		// 返回
		return '{"return": "OK"}';
	}
	
	/**
	 * 编辑
	 */
	public function put_id(){
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['_id'=>create_id(get('id'))], ['$set'=>['feedback.$.content'=>get('content')]], ['multi' => true, 'upsert' => false]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Er_User, $bulk);
	
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
		Mongo::write(DB::$main, COL::$Er_User, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>