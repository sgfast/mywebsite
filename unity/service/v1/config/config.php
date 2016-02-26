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
 * Component配置
 */
class CMP {
	
	// 微信auth认证
	public static $weauth = 'http://weauth.cmp.hesq.com.cn';
	
	// 微信支付
	public static $wepay = 'http://wepay.cmp.hesq.com.cn';
	
	// 阿里支付
	public static $alipay = 'http://alipay.cmp.hesq.com.cn';
	
	// 钱台
	public static $qiantai = 'http://qiantai.cmp.hesq.com.cn';
	
	// 飞印
	public static $feiyin = 'http://feiyin.cmp.hesq.com.cn';
	
	// 上传
	public static $upload = 'http://upload.cmp.hesq.com.cn';
}

?>