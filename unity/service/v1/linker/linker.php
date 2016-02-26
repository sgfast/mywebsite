<?php

/**
 * 使用此类前必须载入全局config，即service下的config
 */
abstract class Linker {
	
	// 加解密对象
	protected $encrypt;
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		// 初始化加解密对象
		$this->encrypt = new STD3Des ( SUB::$key, SUB::$iv );
	}
	
	/**
	 * 获取字符串编码
	 * @param object $model       	
	 */
	public function getParams($model) {
		
		// 获取params参数的值
		$params = $this->modelToParams($model);
		
		// 返回连接过valid之后的字符串
		// 使用时，直接连接到component地址之后即可
		return '?state=' . $params . '&valid=' . SUB::$valid;
	}
	
	/**
	 * 服务端获取model
	 * @param string $encode 编码以后的字符串
	 */
	public function getModel($params) {
		
		// 如果valid参数验证码不正确，则直接退出，拒绝服务
		if (get ( 'valid' ) !== SUB::$valid) {
			echo '拒绝服务';
			exit ();
		}
		
		// 调用并返回encodeToModel，注意，这个方法必须在子类实现
		return $this->paramsToModel ( $params );
	}
	
	/**
	 * 将某个linkermodel对象转换为字符串并返回
	 * @param linkermodel $model
	 * @return string 转换之后的字符串，即每个属性中间加入'|'符之后的字符串
	 */
	protected function modelToEncode($model){
	
		// 声明结果字符串
		$result = '';
	
		// 连接result
		foreach ($model as $m){
	
			// 如果result不为空，则加入|
			if ($result !== ''){
				$result .= '|';
			}
	
			// 连接result实际加密字符串
			$result .= $m;
		}

		// 返回
		return $result;
	}
	
	/**
	 * 将model转换为字符串参数(分为两个，一为params, 一为valid)
	 * @param object $model
	 */
	protected abstract function modelToParams($model);
	
	/**
	 * 将encode过后的字符串序列化为Model的过程，此过程必须由子类实现
	 * 因为每种subject的model不同，且写在其各自的类文件中
	 * @param string $params
	 */
	protected abstract function paramsToModel($params);

}

?>