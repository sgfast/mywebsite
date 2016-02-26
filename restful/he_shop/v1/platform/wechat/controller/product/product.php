<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_all(){
		
		// 取query
		$query = new MongoDB\Driver\Query([], ['limit'=>get('page')*get('skip'), 'skip'=>get('skip')]);
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Pt_Product, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_id(){
		
		// 取query
		$query = query_from_id(get('id'));
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Pt_Product, $query);
		return $result;
	}
	
	/**
	 * 插入
	 */
	public function post_add(){
		
		// 取object
		$this->injection(MOD::$Pt_Product);
		$obj = json_decode(Pt_Product_Main);
		
		// 为obj赋值
		$obj->_id = new MongoDB\BSON\ObjectID();
		$obj->cbid = '56ce78cf434d670ea0003c37';
		$obj->csid = '56cfa422434d670b38006bd2';
		$obj->bid = '56ce9ff2434d670ea0003c5e';
		$obj->name = 'banana';
		$obj->img = [];
		$obj->stand = '10kg';
		$obj->paycash = true;
		$obj->sales->total = 0;
		$obj->sales->month = 0;
		$obj->sales->preset = 0;
		$obj->comment->star = 5;
		$obj->comment->count = 0;
		for ($i=0; $i<5; $i++)
		{
			// shengming
			$obj_set = json_decode(Pt_Product_Set);
			
			// 为obj_set赋值
			$obj_set->aid = $i;
			$obj_set->price = 10;
			$obj_set->point = 10;
			$obj_set->stock = 10;
			$obj_set->code = 0;
			$obj_set->sort = 0;
			$obj_set->visited = 1;
			$obj_set->tag->hidden = false;
			$obj_set->tag->sales = false;
			$obj_set->tag->recom = false;
			$obj_set->tag->new = true;
			
			$obj->set[] = $obj_set;
		}
		
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->insert($obj);
		
		// 插入
		Mongo::write(DB::$main, COL::$Pt_Product, $bulk);
		
		// 返回
		return '{"return": "OK"}';
	}
	
	/**
	 * 编辑
	 */
	public function put_id(){
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['_id'=>create_id(get('id')), 'set.aid'=>get('aid')], ['$set'=>['set.$.price'=>get('price')]], ['multi' => true, 'upsert' => false]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Pt_Product, $bulk);
	
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
		Mongo::write(DB::$main, COL::$Pt_Product, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>