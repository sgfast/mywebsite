<?php

class Controller {
	
	/**
	 * 载入一个model文件
	 */
	public function injection($fileName) {
		
		// 注入model实例
		include '../../common/model/' . $fileName;
	}
}

?>
