<?php

/**
 * 设置编码格式为utf-8
 */
header ( "Content-type: text/html; charset=utf-8" );

/**
 * 打开session
 */
session_start ();

/**
 * 设置断言
 */
assert_options ( ASSERT_ACTIVE, true );
assert_options ( ASSERT_BAIL, true );
assert_options ( ASSERT_WARNING, false );

/**
 * 主题安全相关
 * subject
 */
class SUB{
	public static $key = '*7f36SN1*&@hSbs';
	public static $iv = 'G7s^5L+@';
	public static $valid = 'JU82_5Sa_Oi';
}


/**
 * Component配置
 */
class CP {
	
	// 微信auth认证
	public static $weauth = 'http://weauth.cp.hesq.com.cn/index.php';
	
	// 微信支付
	public static $wepay = 'http://wepay.cp.hesq.com.cn/index.php';
	
	// 阿里支付
	public static $alipay = 'http://alipay.cp.hesq.com.cn/index.php';
	
	// 钱台
	public static $qiantai = 'http://qiantai.cp.hesq.com.cn/index.php';
	
	// 飞印
	public static $feiyin = 'http://feiyin.cp.hesq.com.cn/index.php';
	
	// 上传
	public static $upload = 'http://upload.cp.hesq.com.cn/index.php';
}

?>