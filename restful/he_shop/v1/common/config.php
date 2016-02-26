<?php

/**
 * DIR配置
 */
class DIR{
	public static $debug = 'd:/website/unity/service/';
	public static $production = '/server/webroot/unity/service/';
}

/**
 * INC配置
 */
class INC{

	// includes
	public static $includes = [
			'config/v1/config.php',
			'utility/v1/global.php',
			'utility/v1/stroage.php',
			'restful/v1/authorize.php',
			'restful/v1/restful.php',
			'restful/v1/controller.php',
	];
}

// 为包含数组赋值
$includeDir = DIR::$debug;
if (ENV !== 'DEBUG'){
	$includeDir = DIR::$production;
}

// 导入包含数组
foreach ( INC::$includes as $inc ) {
	include $includeDir . $inc;
}



/**
 * 基础配置
 */


/**
 * MongoDB配置
 */
class DB{
	
	// 主库连接字符串
	public static $main = 'mongodb://192.168.1.44:27017';
}

/**
 * Redis配置
 */
class RS{
	
}



?>