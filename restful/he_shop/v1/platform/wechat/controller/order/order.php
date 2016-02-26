<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_all(){
		
		// 取query
		//$query = query_all();
		$query = new MongoDB\Driver\Query([], ['limit'=>get('page')*get('skip'), 'skip'=>get('skip')]);
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Sp_Order, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_id(){
		
		// 取query
		$query = query_from_id(get('id'));
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Sp_Order, $query);
		return $result;
	}

	/**
	 * 插入
	 */
	public function post_add(){
	
		// 取object
		$this->injection(MOD::$Sp_Order);
		$obj = json_decode(Sp_Order_Main);
	
		// 为obj赋值
		$obj->_id = create_id();
		$obj->aid = 0;
		$obj->uid = '';
		$obj->cid = '';
		$obj->oid = '';
		$obj->eid = '';
		$obj->status = 0;
		$obj->point = 0;
		$obj->product = '';
		$obj->img = '';
		$obj->printed = false;
		
		$obj->receive->express = true;
		$obj->receive->name = '';
		$obj->receive->mobile = '';
		$obj->receive->address = '';
		$obj->receive->mark = '';
		
		$obj->time->create = 0;
		$obj->time->take = 0;
		$obj->time->complete = 0;
		
		$obj->pay->type = 0;
		$obj->pay->complete = false;
		$obj->pay->amount = 0;
		$obj->pay->cash = 0;
		$obj->pay->coupon = 0;
		$obj->pay->online = 0;
		$obj->pay->payable = 0;
		
		$obj->cancle->user = '';
		$obj->cancle->service = '';
		
		$obj->returned->all = false;
		$obj->returned->price = 0;
		$obj->returned->mark = '';
		$obj->returned->product = [];
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->insert($obj);
	
		// 插入
		Mongo::write(DB::$main, COL::$Sp_Order, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
	
	/**
	 * 编辑
	 */
	public function put_id(){
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['_id'=>create_id(get('id')), 'oid'=>get('oid')], ['$set'=>['status'=>1]], ['multi' => true, 'upsert' => false]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Sp_Order, $bulk);
	
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
		Mongo::write(DB::$main, COL::$Sp_Order, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>