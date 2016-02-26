<?php

/**
 * Main */
const Sp_Item_Main = '{
	"_id": "",
    "oid": "",
	"cbid": "",
	"csid": "",
	"bid": "",
	"pid": "",
	"name": "",
	"img": "",
	"price": 0,
	"count": 0,
	"amount": 0
}';

/**
 * Sp_Item */
$Sp_Item = new ModelClass();
$Sp_Item->Main = Sp_Item_Main;

/*
{
	"_id": "",
    "oid": "",							    // 订单的orderid号
	"cbid": "",                             // 大类号
	"csid": "",                             // 小类号
	"bid": "",                              // 品牌id
	"pid": "",                              // 商品id
	"name": "",                             // 商品名称
	"img": "",                              // 商品图片
	"price": 0,                             // 商品原价
	"count": 0,                             // 商品数量
	"amount": 0	                            // 商品总价
}
*/

?>