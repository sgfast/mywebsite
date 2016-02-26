<?php

class Controller {
	
	/**
	 * 载入一个model文件
	 */
	protected function injection($fileName) {
		
		// 注入model实例
		include '../../model/common/model/' . $fileName;
	}
}

?>
