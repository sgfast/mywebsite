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
	"feedback": []
}';

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