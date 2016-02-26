<?php

/**
 * Main */
const Er_User_Main = '{
    "_id": "",
	"aid": 100,
	"openid": "",
	"nickname": "",
	"mobile": "",
	"email": "",
	"thumb": "",
	"point": 0,
	"cash": 0,
	"register": 0,
	"receive": [],
	"coupon": [],
	"feedback": []
}';

/**
 * Receive */
const Er_User_Receive = '{
    "area": "",
    "name": "",
    "mobile": "",
    "address": ""
}
';

/**
 * Coupon */
const Er_User_Coupon = '{
    "cid": "",
    "bid": "",
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
';

/**
 * Feedback */
const Er_User_Feedback = '{
    "content": "",
    "answer": "",
    "time": {
        "submit": 0,
        "answer": 0
    }
}
';

/**
 * Er_User */
$Er_User = new ModelClass();
$Er_User->Main = Er_User_Main;
$Er_User->Receive = Er_User_Receive;
$Er_User->Coupon = Er_User_Coupon;
$Er_User->Feedback = Er_User_Feedback;

/** prototype
	"_id": "",
	"aid": 100,
	"openid": "",
	"nickname": "",
	"mobile": "",
	"email": "",
	"thumb": "",
	"point": 0,
	"cash": 0,
	"register": 0,
	"receive": [{
		"area": "",
		"name": "",
		"mobile": "",
		"address": ""
	}],
	"coupon": [{
		"cid": "",
		"bid": "",
		"value": 0,
		"limit": {
			"value": 0,
			"time": 0
		},
		"time": {
			"get": 0,
			"use": 0,
		}
	}],
	"feedback": [{
		"content": "",
		"answer": "",
		"time": {
			"submit": 0,
			"answer": 0
		}
	}]
}
*/

?>