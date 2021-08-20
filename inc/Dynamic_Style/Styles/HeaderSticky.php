<?php

/**
 * qreate\qreate\Dynamic_Style\Styles\HeaderSticky class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class HeaderSticky extends Component
{
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'qreate_header_sticky_background_style'));
	}

	public function qreate_header_sticky_background_style()
	{
		$qreate_option = get_option('qreate-options');
		$inline_css = '';


		if (isset($qreate_option['display_sticky_header'])) {
			if (isset($qreate_option['sticky_header_bg']) && $qreate_option['sticky_header_bg'] != 'default') {
				$type = $qreate_option['sticky_header_bg'];

				if ($type == 'color') {
					if (!empty($qreate_option['sticky_header_bg_color'])) {
						$inline_css .= 'header#main-header.menu-sticky{
							background : ' . $qreate_option['sticky_header_bg_color'] . '!important;
						}';
					}
				}
				if ($type == 'image') {
					if (!empty($qreate_option['sticky_header_bg_img']['url'])) {
						$inline_css .= 'header#main-header.menu-sticky{
							background : url(' . $qreate_option['sticky_header_bg_img']['url'] . ') !important;
						}';
					}
				}
				if ($type == 'transparent') {
					$inline_css .= 'header#main-header.menu-sticky{
						background : transparent !important;
					}';
				}
			}
		}

		wp_add_inline_style('qreate-global', $inline_css);
	}

}
