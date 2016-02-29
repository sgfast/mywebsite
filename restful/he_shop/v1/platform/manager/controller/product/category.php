<?php

class MyController extends Controller{

	/**
	 * 获取全部大类
	 */
	public function get_bid(){
		
		// 取query
		//$query = query_all();
		$query = new MongoDB\Driver\Query(['fid'=>'']);
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Pt_Category, $query);
		return $result;
	}
	
	/**
	 * 获取某一大类下的全部小类
	 */
	public function get_sid(){
	
		// 取query
		//$query = query_all();
		$query = new MongoDB\Driver\Query(['fid'=>get('fid')]);
	
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Pt_Category, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_id(){
		
		// 取query
		$query = query_from_id(get('id'));
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Pt_Category, $query);
		return $result;
	}
	
	/**
	 * 插入
	 */
	public function post_add(){
		
		// 取object
		$this->injection(MOD::$Pt_Category);
		$obj = json_decode(Pt_Category_Main);
		
		// 为obj赋值
		$obj->_id = new MongoDB\BSON\ObjectID();
		$obj->fid = '56ce78cf434d670ea0003c37';
		$obj->name = '测试小类';
		$obj->sort = 2;
		
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->insert($obj);
		
		// 插入
		Mongo::write(DB::$main, COL::$Pt_Category, $bulk);
		
		// 返回
		return '{"return": "OK"}';
	}
	
	/**
	 * 编辑
	 */
	public function put_id(){
	
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['_id'=>create_id(get('id'))], ['$set'=>['sort'=>get('sort')]], ['multi' => true, 'upsert' => false]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Pt_Category, $bulk);
	
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
		Mongo::write(DB::$main, COL::$Pt_Category, $bulk);
	
		// 返回
		return '{"return": "OK"}';
	}
}

?>