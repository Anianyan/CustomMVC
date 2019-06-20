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
		View::renderTemplateWithTwig(
			'Posts/index.html',
			[
				'posts' => $posts,
			]
		);
	}

	public function addNewAction() {
		echo 'Hello from the addNew action in the Post controller';
	}

	public function editAction() {
	}
}
