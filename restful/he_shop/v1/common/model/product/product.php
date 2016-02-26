<?php

/**
 * Main */
const Pt_Product_Main = '{
    "_id": "",
	"cbid": "",
	"csid": "",
	"bid": "",
	"name": "",
	"img": [],
	"stand": "",
	"paycash": true,
    "sales": {
        "total": 0,
        "month": 0,
        "preset": 0
    },
    "comment": {
		"star": 0,
		"count": 0
	},
	"set": []    
}';

/**
 * Set */
const Pt_Product_Set = '{
    "aid": 100,
    "price": 0,
    "point": 0,
    "stock": 0,
    "code": "",
    "sort": 0,
    "visited": 0,
    "tag": {
        "hidden": false,
        "sales": false,
        "recom": false,
        "new": false
    }
}';

/**
 * Pt_Product */
$Pt_Product = new ModelClass();
$Pt_Product->Main = Pt_Product_Main;
$Pt_Product->Set = Pt_Product_Set;


/** 
{
	"_id": "",                          // id
	"cbid": "",                         // 大类id
	"csid": "",                         // 小类id
	"bid": "",                          // 品牌id
	"name": "",                         // 名称
	"img": [],                          // 图片数组
	"stand": "",                        // 规格
	"paycash": true,                    // 此商品是否可以使用余额支付，默认true
    "sales": {
        "total": 0,                     // 销售总计
        "month": 0,                     // 月销售量
        "preset": 0                     // 销售预设，这个值会在显示销量时加到销量上
    },
	"comment": {
		"star": 0,                      // 评论星级
		"count": 0                      // 评论总数量
	},
    "set": [{
		"aid": "",                      // 区域id，默认100，即无区域。每次操作此集合，aid都必须改变为确实存在的aid
		"price": 0,                     // 价格
		"point": 0,                     // 赠送积分
		"stock": 0,                     // 库存量
		"code": "",                     // 条型码
		"sort": 0,                      // 排序（在不同的位置的排序，均使用此排序。如首页所有新品使用此排序，列表页也使用此排序）
		"visited": 0,                   // 浏览次数
		"tag": {
			"hidden": false,            // 是否为隐藏商品，默认false
			"sales": false,             // 是否为促销商品，默认false
			"recom": false,             // 是否为推荐商品，默认false
			"new": false                // 是否为新品上市，默认false
		}
	}]
}
*/

?>