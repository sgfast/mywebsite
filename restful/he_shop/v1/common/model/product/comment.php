<?php

/**
 * Main */
const Pt_Comment_Main = '{
    "_id": "",
	"pid": "",
	"uid": "",
	"star": 0,
	"ip": "",
	"time": 0,
	"content": ""
}';

/**
 * Pt_Comment */
$Pt_Comment = new ModelClass();
$Pt_Comment->Main = Pt_Comment_Main;

/** prototype
{
	"_id": "",                 // 主键id
	"pid": "",                 // 商品id
	"uid": "",                 // 用户id
	"star": 0,                 // 评分
	"ip": "",                  // 用户ip地址
	"time": 0,                 // 时间戳
	"content": ""              // 评论内容
} 
*/

?>