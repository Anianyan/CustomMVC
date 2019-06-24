<?php

namespace Core;

use \App\Config;
/**
 * Error and exception handler
 */
class Error {

	/**
	 * Error handler. Convert all errors to Exertions by throwing an ErrorException.
	 *
	 * @param int    $level Error level.
	 * @param string $message Error message.
	 * @param string $file Filename the error was raised in.
	 * @param int    $line Line number in the file.
	 *
	 * @return void
	 */
	public static function errorHandler( $level, $message, $file, $line ) {
		if ( error_reporting() !== 0 ) {
			throw new \ErrorException( $message, 0, $level, $file, $line );
		}
	}


	/**
	 * Exception handler.
	 *
	 * @param Exception $exception  The exception.
	 *
	 * @return void
	 */
	public static function exceptionHandler( $exception ) {

		/** Get exception code */
		$code = $exception->getCode();
		if( $code !== 404 ) {
			$code = 500;
		}
		\http_response_code( $code );

		/** Check if define show errors true */
		if ( Config::SHOW_ERRORS ) {
			echo '<h1>Fatal error</h1>';
			echo "<p>Uncaught exception: '" . get_class( $exception ) . "'</p>";
			echo "<p>Message: '" . $exception->getMessage() . "'</p>";
			echo "<p>Stack trace:<pre>'" . $exception->getTraceAsString() . "</pre>'</p>";
			echo "<p>Thrown in '" . $exception->getFile() . "' on Line" .
				$exception->getLine() . '</p>';
		} else {
			$log = dirname( __DIR__ ) . '\\logs\\' . date( 'Y-m-d' ) . '.txt';
			ini_set( 'error_log', $log );

			$msg = "Uncaught exception: '" . get_class( $exception ) . "'";
			$msg .= " with message '" . $exception->getMessage() . "'";
			$msg .= "\nStack trace: " . $exception->getTraceAsString();
			$msg .= "\nThrow in '" . $exception->getFile() . "' on line " . $exception->getLine();

			error_log( $msg );

			/** Get error handler */
			View::renderTemplateWithTwig( "$code.html" );
		}

	}
}
