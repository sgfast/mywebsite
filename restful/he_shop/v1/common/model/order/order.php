<?php

/**
 * Main */
const Sp_Order_Main = '{
    "_id": "",
    "aid": 100,
    "uid": "",
    "cid": "",
    "oid": "",
    "eid": "",
    "status": 0,
    "point": 0,
    "product": "",
    "img": "",
    "printed": false,
    "receive": {
        "express": true,
        "name": "",  
        "mobile": "",
        "address": "",
        "mark": ""
    },
    "time": {
        "create": 0,
        "take": 0,
        "complete": 0
    },
    "pay": {
        "type": 0,
        "complete": false,
        "amount": 0,
        "cash": 0,
        "coupon": 0,
        "online": 0, 
        "payable": 0 
    },
    "cancel": {
        "user": "",
        "service": "" 
    },
    "returned": {
        "all": false,
        "price": 0,
        "mark": "",
        "product": []
    }
}';

/**
 * Product */
const Sp_Order_Product = '{
    "pid": "",
    "stock": false,
    "count": 0
}';

/**
 * Sp_Order */
$Sp_Order = new ModelClass();
$Sp_Order->Main = Sp_Order_Main;
$Sp_Order->Product = Sp_Order_Product;

/** 
{
	"__id": "",                                // 主键id
    "aid": 100,                                // 区域号
    "uid": "",                                 // 用户id
    "cid": "",                                 // 代金券id
    "oid": "",                                 // 订单orderid
    "did": "",                                 // 分销员id
    "eid": "",                                 // 配送员id
    "status": 0,                               // 状态
    "point": 0,                                // 赠送的总积分
    "product": "",                             // 商品名
    "img": "",                                 // 商品图片地址
    "printed": false,                          // 是否已打印
    "receive": {
        "express": true,                       // 是否需要配送
        "name": "",                            // 收货人姓名         
        "mobile": "",                          // 收货人手机
        "address": "",                         // 收货人地址
        "mark": ""                             // 用户备注
    },
    "time": {
        "create": 0,                           // 订单创建时间
        "take": 0,                             // 收货时间
        "complete": 0                          // 完成订单时间
    },
    "pay": {
        "type": 0,                              // 支付方式
        "complete": false,                      // 是否完成支付，默认为false
        "amount": 0,                            // 订单总额
        "cash": 0,                              // 使用的余额
        "coupon": 0,                            // 使用代金券支付的金额
        "online": 0,                            // 在线支付的金额
        "payable": 0                            // 应付，即货到付款的金额
    },
    "cancel": {
        "user": "",                             // 用户取消订单的说明
        "service": ""                           // 客服取消订单的说明
    },
    "returned": {
        "all": false,                           // 是否为全退， 默认为false， 当值为ture时，product数组内容为空
        "price": 0,                             // 已退的总价格
        "mark": "",                             // 退货的备注
        "product": [
            "pid": "",                          // 单退商品id
            "stock": false,                     // 是否返还库存，默认为false
            "count": 0                          // 商品退货的数量
        ]
    }  
}
*/

?>