<?php

namespace Core;

use PDO;
use App\Config;

/**
 * Base model
 */
abstract class Model {
	/**
	 * Get the PDO database connection
	 *
	 * @return object
	 */
	protected static function getDB() {
		static $db = null;

		if ( $db === null ) {

			try {
				$db = new PDO( 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8', Config::DB_USER, Config::DB_PASS );

				$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				return $db;
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
		}
	}
}
