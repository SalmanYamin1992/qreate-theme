<?php
/**
 * Qreate functions and definitions
 *
 * This file must be parseable by PHP 5.2.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package qreate
 */

define( 'QREATE_MINIMUM_WP_VERSION', '4.5' );
define( 'QREATE_MINIMUM_PHP_VERSION', '7.0' );

// Bail if requirements are not met.
if ( version_compare( $GLOBALS['wp_version'], QREATE_MINIMUM_WP_VERSION, '<' ) || version_compare( phpversion(), QREATE_MINIMUM_PHP_VERSION, '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
//woocomerce integration
if (class_exists('WooCommerce')) {
	require get_theme_file_path('/woocommerce/woocommerce-template-functions.php');
	require get_theme_file_path('/woocommerce/woocommerce-template-hooks.php');
}

// Include WordPress shims.
require get_template_directory() . '/inc/wordpress-shims.php';
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/import.php';

// Setup autoloader (via Composer or custom).
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require get_template_directory() . '/vendor/autoload.php';
} else {
	/**
	 * Custom autoloader function for theme classes.
	 *
	 * @access private
	 *
	 * @param string $class_name Class name to load.
	 * @return bool True if the class was loaded, false otherwise.
	 */
	function qreate_autoload( $class_name ) {
		$namespace = 'qreate\qreate';

		if ( strpos( $class_name, $namespace . '\\' ) !== 0 ) {
			return false;
		}

		$parts = explode( '\\', substr( $class_name, strlen( $namespace . '\\' ) ) );

		$path = get_template_directory() . '/inc';
		foreach ( $parts as $part ) {
			$path .= '/' . $part;
		}
		$path .= '.php';

		if ( ! file_exists( $path ) ) {
			return false;
		}

		require_once $path;

		return true;
	}
	spl_autoload_register( 'qreate_autoload' );
}

// Load the `qreate()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Initialize the theme.
call_user_func( 'qreate\qreate\qreate' );