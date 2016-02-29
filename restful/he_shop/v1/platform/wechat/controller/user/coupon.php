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
	
	/**
	 * 插入
	 */
	public function post_add(){
		
		// 取object
		$this->injection(MOD::$Er_Coupon);
		$obj = json_decode(Er_Coupon_Main);
		
		// 为obj赋值
		$obj->_id = create_id();
		$obj->cid = '';
		$obj->bid = '';
		$obj->uid = '';
		$obj->value = 1;
		$obj->limit->value = 10;
		$obj->limit->time = 0;
		$obj->time->get = 0;
		$obj->time->use = 0;
		
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->insert($obj);
		
		// 插入
		Mongo::write(DB::$main, COL::$Er_Coupon, $bulk);
		
		// 返回
		return '{"return": "OK"}';
	}
	
	/**
	 * 编辑
	 */
	public function put_id(){
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['_id'=>create_id(get('id'))], ['$set'=>['time.use'=>time()]], ['multi' => false, 'upsert' => false]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Er_Coupon, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>