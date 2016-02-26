<?php

echo new MongoDB\BSON\ObjectID();

//include 'D:\website\unity\service\utility\v1\stroage.php';

// class ModelClass{}

// /**
//  * Main */
// const Pt_Product_Main = '{
// 	"cbid": "",
// 	"csid": "",
// 	"bid": "",
// 	"name": "",
// 	"img": [],
// 	"stand": "",
// 	"paycash": true,
//     "sales": {
//         "total": 0,
//         "month": 0,
//         "preset": 0
//     },
//     "comment": {
// 		"star": 0,
// 		"count": 0
// 	},
// 	"set": []    
// }';

// /**
//  * Set */
// const Pt_Product_Set = '{
//     "aid": 100,
//     "price": 0,
//     "point": 0,
//     "stock": 0,
//     "code": "",
//     "sort": 0,
//     "visited": 0,
//     "tag": {
//         "hidden": false,
//         "sales": false,
//         "recom": false,
//         "new": false
//     }
// }';

// /**
//  * Pt_Product */
// $Pt_Product = new ModelClass();
// $Pt_Product->Main = Pt_Product_Main;
// $Pt_Product->Set = Pt_Product_Set;

// $main = json_decode($Pt_Product->Main);
// $set = [];

// $main->cbid = 'a';
// $main->csid = 'b';
// $main->name = 'abc';
// $main->stand = 'stand';

// for ($i=0; $i<5; $i++){
	
// 	$s = json_decode($Pt_Product->Set);
// 	$s->aid = $i;
// 	$s->price = 5;
// 	$s->point = 50;
// 	$s->stock = 100;
	
// 	$set[] = $s;
// }

// $main->set = $set;

// // $bulk = new MongoDB\Driver\BulkWrite();
// // $id_1 = $bulk->insert($main);

// // $result = Mongo::write('mongodb://192.168.1.44:27017', 'test.test', $bulk);
// // if (!$result){
// // 	echo '出错啦';
// // }else{
// // 	print_r($result);
// // }


/* $query = new MongoDB\Driver\Query([]);

$result = &Mongo::query('mongodb://192.168.1.44:27017', 'test.test.user', $query);

foreach ($result as $k=>$v){
	print_r($v);
} */

// $query = new MongoDB\Driver\Query([]);

// $result = &Mongo::query('mongodb://10.117.10.92:27017', 'test.user', $query);

// foreach ($result as $k=>$v){
// 	print_r($v);
// }



?>