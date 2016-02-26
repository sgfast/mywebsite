<?php

/**
 * Main */
const Er_Coupon_Main = '{
    "_id": "",
	"cid": "",
	"bid": "",
	"uid": "",
	"value": 0,
	"limit": {
		"value": 0,
		"time": 0
	},
	"time": {
		"get": 0,
		"use": 0,
	}
}';

/**
 * Er_Coupon */
$Er_Coupon = new ModelClass();
$Er_Coupon->Main = Er_Coupon_Main;

/** prototype
{
	"_id": "",
	"cid": "",
	"bid": "",
	"uid": "",
	"value": 0,
	"limit": {
		"value": 0,
		"time": 0
	},
	"time": {
		"get": 0,
		"use": 0,
	}
} 
*/

?>