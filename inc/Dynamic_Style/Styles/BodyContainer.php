<?php
/**
 * qreate\qreate\Dynamic_Style\Styles\BodyContainer class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class BodyContainer extends Component
{

	public function __construct()
	{
		if (class_exists('ReduxFramework')) {
			add_action('wp_enqueue_scripts', array( $this,'qreate_container_width'), 21);
		}
	}

	public function qreate_container_width()
	{
		$qreate_options = get_option('qreate-options');

		$box_container_width = "";

		if (isset($qreate_options['opt-slider-label']) && !empty($qreate_options['opt-slider-label'])) {

			$container_width = $qreate_options['opt-slider-label'];

			$box_container_width = "body.iq-container-width .container,
        							body.iq-container-width .elementor-section.elementor-section-boxed>
        							.elementor-container { max-width: " . $container_width . "px; } ";
		}


		wp_add_inline_style('qreate-style',
			$box_container_width
		);
	}
}
