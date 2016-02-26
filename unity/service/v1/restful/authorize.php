<?php
abstract class Authorize {
	
	/**
	 * 构造方法
	 * @validates 需要验证的bool数组
	 * @comment 如果验证数组中某项失败，则结束本脚本运行，调用callback。如果全部成功，则继续运行
	 */
	public function __construct() {
		
		// 获取本对象方法validates的数组
		$validates = $this->validates ();
		
		// 遍历所有方法，如果存在某一个验证值为false，则调用回调方法，并结束本页运行
		foreach ( $validates as $v ) {
			if (! $v) {
				$this->callback ();
				exit ();
			}
		}
	}
	protected abstract function validates();
	protected abstract function callback();
}

?>
