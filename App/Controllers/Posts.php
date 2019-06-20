<?php
namespace App\Controllers;

use \Core\View;
use App\Models\Post;
/**
 * Post Controller.
 */
class Posts extends \Core\Controller {

	public function indexAction() {

		$posts = Post::getAll();
		View::render( 'Posts/index.php', $posts );
	}

	public function addNewAction() {
		echo 'Hello from the addNew action in the Post controller';
	}

	public function editAction() {
		var_dump( $this->route_params );
	}
}
