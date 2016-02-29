<?php

class Controller {
	
	/**
	 * 载入一个model文件
	 */
	protected function injection($fileName) {
		
		// 注入model实例
		include '../../common/model/' . $fileName;
	}
	
	/**
	 * 生成一个新的id对象
	 * @param string $_id
	 * @return \MongoDB\BSON\ObjectID 如果参数不为空，则根据参数返回id对象，否则生成一个随机新对象
	 */
	protected function createId($_id=''){
		if (empty($_id)){
			return new MongoDB\BSON\ObjectID();
		}else{
			return new MongoDB\BSON\ObjectID($_id);
		}
	}
	
	/**
	 * 创建一个Query对象
	 * @param array $arrFilter 过滤器数组
	 * @param array $arrOption 设置器数组
	 * @return MongoDB\Driver\Query的实例
	 */
	protected function createQuery($arrFilter, $arrOption=null){
		if (is_null($arrOption)){
			return new MongoDB\Driver\Query($arrFilter);
		}else{
			return new MongoDB\Driver\Query($arrFilter, $arrOption);
		}
	}

	/**
	 * 根据一个id返回一个Query对象
	 * @param MongoDB\BSON\ObjectID $_id 已经获取的objectId对象
	 */
	protected function createQueryId($_id){
		return $this->createQuery(['_id'=>$_id]);
	}
	
	/**
	 * 创建一个Insert对象
	 * @param array|object $document
	 * @param MongoDB\Driver\BulkWrite $bulk
	 */
	protected function createInsert($document, $bulk=null){
		$bulk = $this->createBulk($bulk);
		$bulk->insert($document);
		return $bulk;
	}
	
	/**
	 * 创建一个Update对象
	 * @param array $arrFilter 过滤数组
	 * @param array $arrUpdate 更新数据数组
	 * @param MongoDB\Driver\BulkWrite $bulk 
	 */
	protected function createUpdate($arrFilter, $arrUpdate, $bulk=null){
		$bulk = $this->createBulk($bulk);
		$bulk->update($arrFilter, $arrUpdate, ['multi'=>true, 'upsert'=>false]);
		return $bulk;
	}
	
	/**
	 * 创建一个Delete对象
	 * @param array $arrFilter 过滤数组
	 * @param MongoDB\Driver\BulkWrite $bulk 
	 */
	protected function createDelete($arrFilter, $bulk=null){
		$bulk = $this->createBulk($bulk);
		$bulk->delete($arrFilter, ['limit'=>true]);
		return $bulk;
	}
	
	/**
	 * 返回一条成功
	 */
	protected function Ok(){
		return json_decode('{"return":"OK"}');
	}
	
	/**
	 * 返回一条失败
	 * @param string $msg 失败的消息
	 */
	protected function Error($msg){
		if ($msg === "OK"){
			return json_decode('{"return":"Controller::Error方法出错：msg参数不能为OK"}');
		}
		return '{"return":"' . $msg . '"}';
	}
	
	/**
	 * 返回一条带有数据返回值的成功消息
	 * @param object $data 被当作data属性的object
	 */
	protected function Data($result){
		$data = json_decode('{"return":"OK"}');
		$data->data = $result;
		return $data;
	}
	
	/**
	 * 检查$bulk参数是否为null，如果不为null，则直接返回，否则创建一个新的bulk并返回
	 */
	private function createBulk($bulk){
		if (is_null($bulk)){
			return new MongoDB\Driver\BulkWrite();
		}else{
			return $bulk;
		}
	}
}

?>
