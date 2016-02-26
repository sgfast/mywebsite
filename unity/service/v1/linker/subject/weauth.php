<?php

/**
 * weauth的传递model
 */
class WeauthModel{
	public $appid = '';
	public $screct = '';
	public $domain = '';
	public $url = '';	
}

/**
 * 使用此类前必须载入全局config，即service下的config。和上级目录中的subject.php
 */
class WeauthLinker extends Linker{
		
	/**
	 * 实现modelToEncode方法
	 */
	protected function modelToParams($model){
		
		// 将model中的字符串加密， 注意urlencode
		$model->appid = urlencode($this->encrypt->encrypt($model->appid));
		$model->screct = urlencode($this->encrypt->encrypt($model->screct));
		$model->domain = urlencode($this->encrypt->encrypt($model->domain));
		$model->url = urlencode($this->encrypt->encrypt($model->url));

		// 返回（使用父类中的方法，将加密后的model解析为一个字符串）
		return $this->modelToEncode($model);
	}
	
	/**
	 * 实现encodeToModel方法
	 */
	protected function paramsToModel($params){
		
		// 将encode组合为数组
		$arrDecode = explode('|', $params);
		
		// 将组合后的数组各自解密
		foreach ($arrDecode as $key=>$code){
			
			// 注意urldecode
			$arrDecode[$key] = $this->encrypt->decrypt(urldecode($code));
		}
		
		// 将解密后的值放入Model
		$model = new WeauthModel();
		$model->appid = $arrDecode[0];
		$model->screct = $arrDecode[1];
		$model->domain = $arrDecode[2];
		$model->url = $arrDecode[3];
		
		// 返回
		return $model;
	}
}

?>