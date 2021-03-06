<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2012, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace lithium\tests\mocks\data\source;

use lithium\data\source\MongoDb;
use lithium\data\source\mongo_db\Schema;

class MockMongoPost extends \lithium\tests\mocks\data\MockBase {

	protected $_meta = array('source' => 'posts', 'connection' => false);

	public static $connection;

	public static function resetSchema($array = false) {
		if ($array) {
			return static::_object()->_schema = array();
		}
		static::_object()->_schema = new Schema();
	}

	public static function schema($field = null) {
		$result = parent::schema($field);

		if (is_object($result) && get_class($result) == 'lithium\data\Schema') {
			return new Schema(array('fields' => $result->fields(), 'meta'   => $result->meta()));
		}
		return $result;
	}
}

?>