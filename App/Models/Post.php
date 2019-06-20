<?php

namespace App\Models;

use PDO;
/**
 * Post Modal
 *
 * php
 */
class Post {

	/**
	 * Get all post associative array
	 *
	 * @return array
	 */
	public static function getAll() {
		$host     = 'localhost';
		$dbname   = 'test';
		$username = 'root';
		$password = '';
		$result   = '';

		try {
			$db = new PDO( "mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password );

			$stmt = $db->query("SELECT id, title, cintent FROM posts ORDER BY created_at");


			if ( ! empty( $stmt ) ) {
				$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
			}
			return $result;
		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}

}

