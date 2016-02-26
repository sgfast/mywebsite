<?php

// 导入前置文件，此文件中已包含对model的解析
include 'prefix.php';

// 设置跳转参数
$appid = 'appid=' . $model->appid;
$redirect_uri = urlencode(DOMAIN . 'return.php');
$response_type = 'response_type=code';
$scope = 'scope=snsapi_base';
$state = $params;

// 设置跳转路径
$location = 'https://open.weixin.qq.com/connect/oauth2/authorize';
$location .= '?' . $appid;
$location .= '&' . $redirect_uri;
$location .= '&' . $response_type;
$location .= '&' . $scope;
$location .= '&' . $state;
$location .= '#wechat_redirect';

// 跳转到微信地址
header("location: " . $location);

?>