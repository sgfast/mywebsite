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
	
	/**
	 * 插入
	 */
	public function post_add(){
		
		// 取object
		$this->injection(MOD::$Pt_Brand);
		$obj = json_decode(Pt_Brand_Main);
		
		// 为obj赋值
		$obj->_id = create_id();
		$obj->name = 'PEAK';
		$obj->sort = 1;

		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->insert($obj);
		
		// 插入
		Mongo::write(DB::$main, COL::$Pt_Brand, $bulk);
		
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
		Mongo::write(DB::$main, COL::$Pt_Brand, $bulk);
	
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
		Mongo::write(DB::$main, COL::$Pt_Brand, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>