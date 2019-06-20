<?php

namespace Core;

class View {

	public static function render( $view, $args = [] ) {

		extract( $args, EXTR_SKIP );

		$file = '../App/Views/' . $view;

		if ( is_readable( $file ) ) {
			require $file;
		} else {
			echo $file . 'not found';
		}
	}

	/**
	 * Generate template with Twig
	 */
	public static function renderTemplateWithTwig( $template, $args = [] ) {
		static $twig = null;

		if ( $twig === null ) {
			$loader = new \Twig\Loader\FilesystemLoader( '../App/Views' );
			$twig   = new \Twig\Environment( $loader );
		}
		echo $twig->render( $template, $args );
	}
}
