<?php

namespace Core;

use PDO;

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
			$host     = 'localhost';
			$dbname   = 'test';
			$username = 'root';
			$password = '';
			$result   = '';

			try {
				$db = new PDO( "mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password );

				return $db;
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
		}
	}
}
