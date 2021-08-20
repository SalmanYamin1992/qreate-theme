<?php

/**
 * qreate\qreate\Dynamic_Style\Styles\Banner class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class Color extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'qreate_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_banner_title_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_layout_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_loader_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_bg_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_opacity_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_header_radio'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_footer_color'), 20);
	}

	public function qreate_color_options()
	{

		$qreate_option = get_option('qreate-options');
		if (function_exists('get_field') && class_exists('ReduxFramework')) {
			$color_var = ':root { ';
			if (isset(get_field('key_color_pallete')['primary_color']) && !empty(get_field('key_color_pallete')['primary_color']) && get_field('key_color_switch') === "yes") {
				$color = get_field('key_color_pallete')['primary_color'];
				$color_var .= '--color-theme-secondary: ' . $color . ' !important;';
			} else {
				if ($qreate_option['custom_color_switch'] == 'yes' && isset($qreate_option['primary_color']) && !empty($qreate_option['primary_color'])) {
					$color = $qreate_option['primary_color'];
					$color_var .= '--color-theme-secondary: ' . $color . ' !important;';
				}
			}

			if (isset(get_field('key_color_pallete')['secondary_color']) && !empty(get_field('key_color_pallete')['secondary_color']) && get_field('key_color_switch') === "yes") {
				$color = get_field('key_color_pallete')['secondary_color'];
				$color_var .= '--color-theme-primary: ' . $color . ' !important;';
			} else {
				if ($qreate_option['custom_color_switch'] == 'yes' && isset($qreate_option['secondary_color']) && !empty($qreate_option['secondary_color'])) {
					$color = $qreate_option['secondary_color'];
					$color_var .= '--color-theme-primary: ' . $color . ' !important;';
				}
			}
			if (isset(get_field('key_color_pallete')['text_color']) && !empty(get_field('key_color_pallete')['text_color']) && isset(get_field('mode_variation')['light-mode']) && get_field('key_color_switch') === "yes" && get_field('mode_variation')['light-mode'] && get_field('mode_variation') === "light-mode") {
				$color = get_field('key_color_pallete')['text_color'];
				$color_var .= '--global-font-color: ' . $color . ' !important;';
				$color_var .= '--global-body-lightcolor: ' . $color . ' !important;';
				$color_var .= '--light-theme-global-color: ' . $color . ' !important;';
				$color_var .= '--global-body-bgcolor: ' . $color . ' !important;';

			} else if (isset(get_field('key_color_pallete')['text_color']) && !empty(get_field('key_color_pallete')['text_color']) && get_field('key_color_switch') === "yes" && get_field('mode_variation')['dark-mode'] && get_field('mode_variation') === "dark-mode") {
				$color = get_field('key_color_pallete')['text_color'];
				$color_var .= '--global-font-color: ' . $color . ' !important;';
			} else {
				if ($qreate_option['custom_color_switch'] == 'yes' && isset($qreate_option['text_color']) && !empty($qreate_option['text_color'])) {
					$color = $qreate_option['text_color'];
					$color_var .= '--global-font-color: ' . $color . ' !important;';
				}
			}

			if (isset(get_field('key_color_pallete')['title_color']) && !empty(get_field('key_color_pallete')['title_color']) && get_field('key_color_switch') === "yes") {
				$color = get_field('key_color_pallete')['title_color'];
				$color_var .= ' --global-font-title: ' . $color . ' !important;';
			} else {
				if ($qreate_option['custom_color_switch'] == 'yes' && isset($qreate_option['title_color']) && !empty($qreate_option['title_color'])) {
					$color = $qreate_option['title_color'];
					$color_var .= ' --global-font-title: ' . $color . ' !important;';
				}
			}

			if (isset(get_field('key_color_pallete')['tertiary_color']) && !empty(get_field('key_color_pallete')['tertiary_color']) && get_field('key_color_switch') === "yes") {
				$color = get_field('key_color_pallete')['tertiary_color'];
				$color_var .= '--dark-theme-box-bg: ' . $color . ' !important;';
			} else {
				if ($qreate_option['custom_color_switch'] == 'yes' && isset($qreate_option['tertiary_color']) && !empty($qreate_option['tertiary_color'])) {
					$color = $qreate_option['tertiary_color'];
					$color_var .= '--dark-theme-box-bg: ' . $color . ' !important;';
				}
			}

			if (isset(get_field('key_color_pallete')['light_tertiary_color']) && !empty(get_field('key_color_pallete')['light_tertiary_color']) && get_field('key_color_switch') === "yes") {
				$color = get_field('key_color_pallete')['light_tertiary_color'];
				$color_var .= '--light-btn-bg: ' . $color . ' !important;';
			} else {
				if ($qreate_option['custom_color_switch'] == 'yes' && isset($qreate_option['light_tertiary_color']) && !empty($qreate_option['light_tertiary_color'])) {
					$color = $qreate_option['light_tertiary_color'];
					$color_var .= '--light-btn-bg: ' . $color . ' !important;';
				}
			}
			$color_var .= '}';
			wp_add_inline_style('qreate-global', $color_var);
		}
	}

	public function qreate_banner_title_color()
	{
		//Set Body Color
		$qreate_option = get_option('qreate-options');

		if (!empty($qreate_option['bg_title_color'])) {
			$bg_title_color = $qreate_option['bg_title_color'];
		}

		$bn_title_color = "";

		if (!empty($bg_title_color)) {
			$bn_title_color .= "
        .qreate-breadcrumb-one .title{
            color: $bg_title_color !important;
        }";
		}
		wp_add_inline_style('qreate-global', $bn_title_color);
	}

	public function qreate_layout_color()
	{
		//Set Body Color
		$qreate_option = get_option('qreate-options');

		if (!empty($qreate_option['qreate_layout_color'])) {
			$qreate_layout_color = $qreate_option['qreate_layout_color'];
		}
		$body_accent_color = "";

		if (isset($body_back_color) && !empty($body_back_color)) {
			$body_accent_color .= "
        body {
            background-color: $body_back_color !important;
        }";
		} else if (!empty($qreate_option['layout_set']) && $qreate_option['layout_set'] == "1" && $key_body_bg_col['body_variation'] != 'default') {
			if (!empty($qreate_layout_color) && $qreate_layout_color != '#ffffff') {
				$body_accent_color .= "
            body {
                background-color: $qreate_layout_color !important;
            }";
			}
		} else {
			$body_accent_color = "";
		}

		wp_add_inline_style('qreate-style', $body_accent_color);
	}

	public function qreate_loader_color()
	{
		//Set Loader Background Color
		$qreate_option = get_option('qreate-options');

		if (!empty($qreate_option['loader_color'])) {
			$loader_color = $qreate_option['loader_color'];
		}
		$ld_color = "";

		if (!empty($loader_color) && $loader_color != '#ffffff') {
			$ld_color .= "#loading {
								background : $loader_color !important;
							}";
		}
		wp_add_inline_style('qreate-style', $ld_color);
	}

	public function qreate_bg_color()
	{
		//Set Background Color
		$qreate_option = get_option('qreate-options');

		if (!empty($qreate_option['bg_color'])) {
			$bg_color = $qreate_option['bg_color'];
		}
		$background_color = "";

		if (!empty($qreate_option['bg_type']) && $qreate_option['bg_type'] == "1") {
			if (!empty($bg_color) && $bg_color != '#ffffff') {
				$background_color .= "
            .qreate-bg-over {
                background : $bg_color !important;
            }";
			}
		}
		wp_add_inline_style('qreate-style', $background_color);
	}

	public function qreate_opacity_color()
	{
		//Set Background Opacity Color
		$qreate_option = get_option('qreate-options');

		if (!empty($qreate_option['bg_opacity']) && $qreate_option['bg_opacity'] == "3") {
			$bg_opacity = $qreate_option['opacity_color']['rgba'];
		}
		$op_color = "";

		if (!empty($qreate_option['bg_opacity']) && $qreate_option['bg_opacity'] == "3") {
			if (!empty($bg_opacity) && $bg_opacity != '#ffffff') {
				$op_color .= "
        .breadcrumb-video::before,.breadcrumb-bg::before, .breadcrumb-ui::before {
            background : $bg_opacity !important;
        }";
			}
		}
		wp_add_inline_style('qreate-style', $op_color);
	}

	public function qreate_header_radio()
	{
		//Set Text Logo Color
		$qreate_option = get_option('qreate-options');

		if (!empty($qreate_option['header_color'])) {
			$logo = $qreate_option['header_color'];
		}
		$logo_color = "";

		if (!empty($qreate_option['header_radio']) && $qreate_option['header_radio'] == "1") {
			if (!empty($logo) && $logo != '#ffffff') {
				$logo_color .= "
            .logo-text {
                color : $logo !important;
            }";
			}
		}
		wp_add_inline_style('qreate-style', $logo_color);
	}

	public function qreate_footer_color()
	{
		//Set Footer Background Color
		$qreate_option = get_option('qreate-options');

		if (!empty($qreate_option['change_footer_color']) && $qreate_option['change_footer_color'] == "0") {
			$f_color = $qreate_option['footer_color'];
		}
		$footer_color = "";
		if (function_exists('get_field') && !empty(get_field('footer_background_color'))) {
			$f_back_color = get_field('footer_background_color');

			$footer_color .= "
                    .qreate-over-dark-90 {
                        background : $f_back_color !important;
                    }";
		} else if (!empty($qreate_option['change_footer_color']) && $qreate_option['change_footer_color'] == "0") {
			if (!empty($f_color) && $f_color != '#ffffff') {
				$footer_color .= "
            .qreate-over-dark-90 {
                background : $f_color !important;
            }";
			}
		} else {
			$footer_color = '';
		}

		wp_add_inline_style('qreate-style', $footer_color);
	}
}
