<?php

/**
 * qreate\qreate\Dynamic_Style\Styles\Footer class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class Footer extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'qreate_footer_dynamic_style'), 20);
	}

	public function qreate_footer_dynamic_style()
	{
		
		$page_id = get_queried_object_id();
		$qreate_options = get_option('qreate-options');
		$footer_css = '';
		if (function_exists('get_field') && get_field('acf_key_footer_switch', $page_id) != 'default') {
			if (get_field('acf_key_footer_switch') == 'no') {
				$footer_css = 'footer.footer { 
					display : none !important;
				}';
			}
		} else if (isset($qreate_options['footer_top'])) {

			if ($qreate_options['footer_top'] == 'no') {
				$footer_css = 'footer.footer { 
					display : none !important;
				}';
			}
		}

		if(function_exists('get_field')) {
			if (get_field('field_footer_bg_color') && !empty(get_field('field_footer_bg_color'))) {
				$footer_bg_color = get_field('field_footer_bg_color');
				$footer_css .= ".footer {
						background-color: $footer_bg_color !important;
					}";
			} else if (isset($qreate_options['change_footer_color'])) {

				if ($qreate_options['change_footer_color'] == '0') {
					$footer_bg_color = $qreate_options['footer_bg_color'];
					$footer_css .= ".footer {
						background-color: $footer_bg_color !important;
					}";
				}
			}
		}


		wp_add_inline_style('qreate-global', $footer_css);
	}
}
