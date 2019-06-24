<?php
/**
 * Fron Controller
 *
 * PHP version 7.2 x64
 */

/**
 * Twig
 */
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

// require '../Core/Router.php';
/**
 * Autoload
 */
spl_autoload_register(
	function( $class ) {
			$root = dirname( __DIR__ );
			$file = $root . '/' . str_replace( '\\', '/', $class ) . '.php';

		if ( is_readable( $file ) ) {
			  require $root . '/' . str_replace( '\\', '/', $class ) . '.php';
		}
	}
);

/** Error and Exception handler */
error_reporting( E_ALL );
set_error_handler( 'Core\Error::errorHandler' );
set_exception_handler( 'Core\Error::exceptionHandler' );


$router = new Core\Router();

// Add the routes
$router->add(
	'',
	[
		'controller' => 'Home',
		'action'     => 'index',
	]
);
$router->add( '{controller}/{action}' );
$router->add( '{controller}/{id:\d+}/{action}' );
$router->add( 'admin/{controller}/{action}', [ 'namespace' => 'Admin' ] );

$router->dispatch( $_SERVER['QUERY_STRING'] );
