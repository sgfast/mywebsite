<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_feedbacks(){
	
		// 取query
		$query = new MongoDB\Driver\Query(['_id'=>create_id(get('uid'))], ['projection'=>['nickname'=>1, 'feedback'=>1]]);
	
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Er_User, $query);
		return $result;
	}
	
	/**
	 * 获取单条
	 */
	public function get_index(){
	
		// 取query
		$query = new MongoDB\Driver\Query(['_id'=>create_id(get('uid'))], ['projection'=>['nickname'=>1, 'feedback'=>['$slice'=>get('index')]]]);
		
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
		$obj = json_decode(Er_User_Feedback);
		
		// 为obj赋值
		$obj->content = '';
		$obj->time->submit = 0;
		$obj->time->answer = 0;
		
		// 注册bulk
		$bulk = new MongoDB\Driver\BulkWrite();
		$bulk->update(['_id'=>create_id(get('uid'))], ['$push'=>$obj], ['multi' => true, 'upsert' => false]);
		
		// 插入
		Mongo::write(DB::$main, COL::$Er_User, $bulk);
		
		// 返回
		return '{"return": "OK"}';
	}

}

?>