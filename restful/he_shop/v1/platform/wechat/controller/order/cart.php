<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_all(){
		
		// 取query
		$query = query_all();
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Sp_Cart, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_id(){
		
		// 取query
		$query = query_from_id(get('id'));
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Sp_Cart, $query);
		return $result;
	}

	/**
	 * 插入
	 */
	public function post_add(){
	
		// 取object
		$this->injection(MOD::$Sp_Cart);
		$obj = json_decode(Sp_Cart_Main);
	
		// 为obj赋值
		$obj->_id = create_id();
		$obj->aid = 0;
		$obj->uid = '';
		$obj->pid = '';
		$obj->count = 0;
		$obj->time = 0;
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->insert($obj);
	
		// 插入
		Mongo::write(DB::$main, COL::$Sp_Cart, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
	
	/**
	 * 编辑
	 */
	public function put_id(){
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['name'=>'NIKE'], ['$set'=>['sort'=>5]], ['multi' => true, 'upsert' => false]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Sp_Cart, $bulk);
	
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
		Mongo::write(DB::$main, COL::$Sp_Cart, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>