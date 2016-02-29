<?php

class MyController extends Controller{

	/**
	 * 获取全部
	 */
	public function get_all(){
		
		// 取query
		$query = $this->createQuery([], ['limit'=>get('page')*get('skip'), 'skip'=>get('skip')]);
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Sp_Express, $query);
		
		// 返回
		return $this->Data($result);
	}
	
	/**
	 * 获取单条
	 */
	public function get_id(){
		
		// 取query
		$query = $this->createQueryId($this->createId(get('id')));
		
		// 取值
		$result = &Mongo::query(DB::$main, COL::$Sp_Express, $query);
		
		// 返回
		return $this->Data($result);
	}
	
	/**
	 * 插入
	 */
	public function post_add(){
	
		// 取object
		$this->injection(MOD::$Sp_Express);
		$obj = json_decode(Sp_Express_Main);
	
		// 为obj赋值
		$obj->_id = $this->createId();
		$obj->aid = 0;
		$obj->name = '王铁柱';
		$obj->mobile = '13013013130';
	
		// 注册bulk
		$bulk = $this->createInsert($obj);
	
		// 插入
		Mongo::write(DB::$main, COL::$Sp_Express, $bulk);

		// 返回
		return $this->Ok();
	}
	
	/**
	 * 编辑
	 */
	public function put_id(){
	
		// 注册bulk
		$bulk = $this->createUpdate(['name'=>'NIKE'], ['$set'=>['sort'=>5]], ['multi' => false, 'upsert' => true]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Sp_Express, $bulk);
	
		// 返回
		return $this->Ok();
	}

	/**
	 * 删除
	 */
	public function delete_id(){
	
		// 注册bulk
		$bulk = $this->createDelete(['_id'=>create_id(get('id'))]);
	
		// 插入
		Mongo::write(DB::$main, COL::$Sp_Express, $bulk);
	
		// 返回
		return $this->Ok();
	}
}

?>