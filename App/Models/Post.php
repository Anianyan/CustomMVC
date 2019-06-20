<?php

namespace App\Models;

use PDO;
/**
 * Post Modal
 */
class Post extends \Core\Model {

	/**
	 * Get all post associative array
	 *
	 * @return array
	 */
	public static function getAll() {

		try {
			$db   = static::getDB();
			$stmt = $db->query( 'SELECT id, title, cintent FROM posts ORDER BY created_at' );

			if ( ! empty( $stmt ) ) {
				$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
			}
			return $result;
		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}

}

