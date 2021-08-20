<?php
/**
 * qreate\qreate\Post_Thumbnails\Component class
 *
 * @package qreate
 */

namespace qreate\qreate\Post_Thumbnails;

use qreate\qreate\Component_Interface;
use function add_action;
use function add_theme_support;
use function add_image_size;

/**
 * Class for managing post thumbnail support.
 *
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'post_thumbnails';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_add_post_thumbnail_support' ) );
		add_action( 'after_setup_theme', array( $this, 'action_add_image_sizes' ) );
	}

	/**
	 * Adds support for post thumbnails.
	 */
	public function action_add_post_thumbnail_support() {
		add_theme_support( 'post-thumbnails' );
	}

	/**
	 * Adds custom image sizes.
	 */
	public function action_add_image_sizes() {
		add_image_size( 'qreate-featured', 720, 480, true );
		add_image_size( 'qreate-project', 317, 332, true );
		add_image_size( 'qreate-project-1', 666, 530, true );
		add_image_size( 'qreate-project-2', 1000, 500, true );
		add_image_size( 'qreate-service-1', 475, 590, true );
		add_image_size( 'qreate-service-2', 475, 520, true );
		add_image_size( 'qreate-project-port-1', 551, 700, true );
		add_image_size( 'qreate-project-port-2', 551, 550, true );
		add_image_size( 'qreate-project-port-2', 551, 400, true );
	}
}
