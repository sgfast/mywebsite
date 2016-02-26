<?php
class Mongo {
	
	/**
	 * 查询数据
	 * @strDatabase 数据库连接字符串
	 * @strNamespace 数据集合全名称
	 * @objQuery MongoDB\Driver\Query实例对象
	 * 
	 * @return MongoDB\Driver\Cursor
	 */
	public static function &query(string $strConnection, string $strNamespace, MongoDB\Driver\Query $objQuery) {
		try {
			$manager = Mongo::getMongoManager ( $strConnection );
			$cursor = $manager->executeQuery ( $strNamespace, $objQuery );
			foreach ($cursor as $doc){
				$result[] = $doc;
			}
			return $result;
		} catch ( MongoDB\Driver\Exception $e ) {
			// werr();
			// wlog($e);
			return false;
		}
	}
	
	/**
	 * 增删改数据
	 * @strDatabase 数据库连接字符串
	 * @strNamespace 数据集合全名称
	 * @$objBulk MongoDB\Driver\BulkWrite实例对象
	 * 
	 * @return MongoDB\Driver\WriteResult
	 */
	public static function write(string $strConnection, string $strNamespace, MongoDB\Driver\BulkWrite $objBulk) {
		try {
			$manager = Mongo::getMongoManager ( $strConnection );
			return $manager->executeBulkWrite ( $strNamespace, $objBulk );
		} catch ( MongoDB\Driver\Exception $e ) {
			// werr();
			// wlog($e);
			return false;
		}
	}
	
	/**
	 * 获取一个MongoManager对象（已连接到数据库）
	 * $strDatabase 数据库连接字符串
	 */
	private static function getMongoManager(string $strConnection) {
		return new MongoDb\Driver\Manager ( $strConnection );
	}
}

?>