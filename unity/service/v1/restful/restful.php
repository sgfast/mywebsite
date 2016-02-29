<?php

/**
 * Restful基础类 */
class Restful {
	
	/**
	 * 访问使用的方法(GET, POST等)
	 */
	private $method;
	
	/**
	 * 本次访问使用的路由
	 */
	private $router;
	
	/**
	 * 本次访问使用的action
	 */
	private $action;
	
	/**
	 * 本次访问的输出对象(数组)
	 */
	private $output;
	
	/**
	 * 过滤器注册数组，三维数组。具有：fullActins[数组], fileName, funcName字段
	 */
	private $filters;
	
	/**
	 * 初始化
	 */
	public function __construct() {
		
		// 初始化method
		$this->initMethod ();
		
		// 初始化router
		$this->initRouter ();
		
		// 初始化 action
		$this->initAction ();
		
		// 载入controller文件
		$this->load ();
		
		// 执行
		$this->execute ();
	}
	
	/**
	 * 添加一个过滤器
	 */
	protected function addFilter($fullActions, $fileName, $funcName) {
		
		// 如果$this->filters为空，则初始化为[]
		if (! isset ( $this->filters )) {
			$this->filters = [ ];
		}
		
		// 将传入的filter添加到$this->filters上
		$filter = [ 
				'fullActions' => $fullActions,
				'fileName' => $fileName,
				'funcName' => $funcName 
		];
		$this->filters [] = $filter;
	}
	
	/**
	 * 如果需要使用过滤器，请使用子类覆盖本方法
	 */
	protected function initFilters() {
	}
	
	/**
	 * 初始化Method
	 */
	private function initMethod() {
		$this->method = strtolower ( $_SERVER ['REQUEST_METHOD'] );
	}
	
	/**
	 * 初始化Router
	 */
	private function initRouter() {
		
		// 分解get参数
		$master = get ( 'master' );
		$controller = get ( 'controller' );
		
		// 组合router
		$this->router = "${master}/${controller}.php";
	}
	
	/**
	 * 初始化Action
	 */
	private function initAction() {
		
		// 获取action参数
		$action = get ( 'action' );
		
		// 组合action
		$this->action = $this->method . '_' . $action;
	}
	
	/**
	 * 载入controller文件
	 */
	private function load() {
		include 'controller/' . $this->router;
	}
	
	/**
	 * 执行controller action
	 */
	private function execute() {
		
		// 记录执行是否成功
		$flag = true;
		
		// 调用action，注意使用try语句
		try {
			$controller = new MyController ();
			$action = new ReflectionMethod ( $controller, $this->action );
			$this->output = $action->invoke ( $controller );
		} catch ( ReflectionException $e ) {
			
			// 如果执行出错，则将flag设置为false
			$flag = false;
		}
		
		// 如果this-output出错，则不应该往下执行
		if ($this->output->return !== 'OK'){
			echo json_encode($this->output);
			exit;
		}
		
		// 如果执行无错，且方法为GET，则使用过滤器
		if ($flag && $this->method === 'get' && isset($this->filters)) {
			
			// 遍历过滤器
			foreach ( $this->filters as $filter ) {
				
				// fullActions是数组形式的，此处要遍历actions取出action
				foreach ( $filter ['fullActions'] as $action ) {
					
					// 如果filter的fullAction等于当前的$this->action，则调用该过滤器
					if ($action === $this->action) {
						
						// 载入文件
						include 'filter/' . $filter ['fileName'];
						
						// 取过滤器的方法
						$func = $filter ['funcName'];
						
						// 调用Filter方法()
						$this->output = $func ( $this->output );
					}
				}
			}
		}
		
		// 最终输出
		echo json_encode($this->output);
	}
}

?>
