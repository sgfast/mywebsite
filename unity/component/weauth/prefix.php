<?php

// 配置域名
const DOMAIN = 'http://weauth.cp.sgboke.com/';

// 导入文件
include '';

// 声明linker,model
$linker = new WeauthLinker();
$model = new WeauthModel();

// 获取params
$params = get('state');

// 解析model
$model = $linker->getModel($params);

?>