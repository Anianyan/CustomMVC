<?php
namespace App\Controllers;

use \Core\View;

/**
 * Home controller.
 */
class Home extends \Core\Controller {

	protected function before() {
		// echo "(before)";
	}

	protected function after() {
		// echo "(after)";
	}


	public function indexAction() {
		View::render(
			'Home/index.php',
			[
				'name'   => 'Dave',
				'colors' => [ 'red', 'yellow', 'black' ],
			]
		);
	}
}
