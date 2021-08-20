<?php

/**
 * qreate\qreate\Dynamic_Style\Styles\General class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class General extends Component
{
	public function __construct()
	{

		add_action('wp_enqueue_scripts', array($this, 'qreate_create_general_style'), 20);
	}

	public function qreate_create_general_style()
	{

		$qreate_option = get_option('qreate-options');
		$general_var = ':root { ';

		if (isset($qreate_option['grid_container']) && !empty($qreate_option['grid_container'])) {
			$general = $qreate_option['grid_container']['width'];
			$general_var .= ' --content-width: ' . $general . ' !important;';
		}
		$general_var .= '}';
		if ($qreate_option['body_set_option'] == 1) {
			if (
				isset($qreate_option['body_color'])  && !empty($qreate_option['body_color'])
			) {
				$general = $qreate_option['body_color'];
				$general_var .= ' body { background : ' . $general . ' !important; }';
			}
		}
		if ($qreate_option['body_set_option'] == 3) {
			if (isset($qreate_option['body_image']['url']) && !empty($qreate_option['body_image']['url'])) {
				$general = $qreate_option['body_image']['url'];
				$general_var .= '
					body { background-image: url(' . $general . ') !important; }';
			}
		}

		if ($qreate_option['back_to_top_btn'] == 'no') {
			if (isset($qreate_option['back_to_top_btn']) && !empty($qreate_option['back_to_top_btn'])) {
				$general_var .= '
					#back-to-top { display: none !important; }';
			}
		}

		wp_add_inline_style('qreate-global', $general_var);
	}
}
