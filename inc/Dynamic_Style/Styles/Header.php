<?php

/**
 * qreate\qreate\Dynamic_Style\Styles\Header class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;


class Header extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'qreate_header_background_style'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_menu_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_sub_menu_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_responsive_menu_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_action_btn_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'qreate_header_social_dynamic_style'));
	}

	public function qreate_header_background_style()
	{
		$qreate_option = get_option('qreate-options');
		$dynamic_css = '';

		if (isset($qreate_option['qreate_header_background_type'])) {
			if (isset($qreate_option['qreate_header_background_type']) && $qreate_option['qreate_header_background_type'] != 'default') {
				$type = $qreate_option['qreate_header_background_type'];
				if ($type == 'color') {
					if (!empty($qreate_option['qreate_header_background_color'])) {
						$dynamic_css = 'header#main-header{
							background : ' . $qreate_option['qreate_header_background_color'] . '!important;
						}';
					}
				}
				if ($type == 'image') {
					if (!empty($qreate_option['qreate_header_background_image']['url'])) {
						$dynamic_css = 'header#main-header{
							background : url(' . $qreate_option['qreate_header_background_image']['url'] . ') !important;
						}';
					}
				}
				if ($type == 'transparent') {
					$dynamic_css = 'header#main-header{
						background : transparent !important;
					}';
				}
			}
		}
		wp_add_inline_style('qreate-global', $dynamic_css);
	}

	public function qreate_menu_color_options()
	{

		$qreate_option =  get_option('qreate-options');
		$inline_css = '';

		if (!empty($qreate_option['menu_color']) && $qreate_option['menu_color'] == "custom") {

			if (isset($qreate_option['header_menu_color']) && !empty($qreate_option['header_menu_color'])) {
				$inline_css .= 'header .navbar ul li a, header .navbar ul li svg, .sf-menu > li > a{
						color : ' . $qreate_option['header_menu_color'] . '!important;
					}';
			}

			if (isset($qreate_option['active_menu_color']) && !empty($qreate_option['active_menu_color'])) {
				$inline_css .= 'header .navbar ul li.current-menu-item a, header .navbar ul li.current-menu-parent > a, header .navbar ul li.current-menu-parent svg, header .navbar ul li.current-menu-item svg, header .navbar ul li.current-menu-ancestor> a, header .navbar ul li.current-menu-ancestor> svg,.sf-menu  li.current-menu-item > a,
				.sf-menu li.current-menu-ancestor > a{
						color : ' . $qreate_option['active_menu_color'] . ' !important;
					}';
			}

			if (isset($qreate_option['hover_menu_color']) && !empty($qreate_option['hover_menu_color'])) {
				$inline_css .= 'header .navbar ul li:hover > a,header .navbar ul li:hover > svg,.sf-menu  li:hover > a,
				.sf-menu li:hover > a{
						color : ' . $qreate_option['hover_menu_color'] . ' !important;
					}';
			}
		}

		wp_add_inline_style('qreate-global', $inline_css);
	}

	public function qreate_sub_menu_color_options()
	{
		$qreate_option = get_option('qreate-options');
		$inline_css = '';
		if (isset($qreate_option['header_submenu_color_type']) && $qreate_option['header_submenu_color_type'] == 'custom') {
			if (isset($qreate_option['submenu_color']) && !empty($qreate_option['submenu_color'])) {
				$inline_css .= 'header .navbar ul li .sub-menu li > a,.sf-menu ul.sub-menu a{
                   	color : ' . $qreate_option['submenu_color'] . ' !important; 
				}';
			}

			if (isset($qreate_option['active_submenu_color']) && !empty($qreate_option['active_submenu_color'])) {
				$inline_css .= 'header .navbar ul li .sub-menu li.current-menu-parent a, header .navbar ul li .sub-menu li.menu-item.current-menu-item a,
				.sf-menu ul.sub-menu li.current-menu-ancestor>a, .sf-menu ul.sub-menu li.current-menu-item>a, .sf-menu ul.sub-menu li.menu-item.current-menu-parent>a,.sf-menu ul.sub-menu li.current-menu-parent>a, .sf-menu ul.sub-menu li .sub-menu li.current-menu-item>a {
					color : ' . $qreate_option['active_submenu_color'] . ' !important;
				}';
			}

			if (isset($qreate_option['hover_submenu_color']) && !empty($qreate_option['hover_submenu_color'])) {
				$inline_css .= 'header .navbar ul li .sub-menu li:hover > a, header .navbar ul li .sub-menu li .sub-menu li.menu-item:hover a,
				.sf-menu ul.sub-menu li.sfHover>a, .sf-menu ul.sub-menu li:hover>a {  
					color : ' . $qreate_option['hover_submenu_color'] . ' !important;  
				}';
			}
		}
		wp_add_inline_style('qreate-global', $inline_css);
	}

	public function qreate_responsive_menu_color_options()
	{
		$qreate_option = get_option('qreate-options');
		$inline_css = '';


		if (isset($qreate_option['responsive_menu_button_type']) && $qreate_option['responsive_menu_button_type'] == 'custom') {
			if (isset($qreate_option['burger_menu_icon']) && !empty($qreate_option['burger_menu_icon'])) {
				$inline_css .= ' .qreate-menu-box .hamburger.two,.qreate-menu-box .hamburger {
                    background-color : ' . $qreate_option['burger_menu_icon'] . ' !important;
                }';
			}
			if (isset($qreate_option['burger_menu_popup_bg']) && !empty($qreate_option['burger_menu_popup_bg'])) {
				$inline_css .= ' header .navbar-toggler{
                    background : ' . $qreate_option['burger_menu_popup_bg'] . ' !important;
                }';
			}

			if (isset($qreate_option['responsive_menu_color']) && !empty($qreate_option['responsive_menu_color'])) {
				$inline_css .= '@media (max-width: 1199px){
					header .navbar ul li a, header .navbar ul li svg{
                    color : ' . $qreate_option['responsive_menu_color'] . ' !important;
                }
            }';
			}
			if (isset($qreate_option['responsive_active_menu_color']) && !empty($qreate_option['responsive_active_menu_color'])) {
				$inline_css .= '@media (max-width: 1199px){
					header .navbar ul li.current-menu-item a, header .navbar ul li.current-menu-parent > a, header .navbar ul li.current-menu-parent svg, header .navbar ul li.current-menu-item svg, header .navbar ul li.current-menu-ancestor> a, header .navbar ul li.current-menu-ancestor> svg{
                    color : ' . $qreate_option['responsive_active_menu_color'] . ' !important;
                }
            }';
			}
			if (isset($qreate_option['responsive_hover_menu_color']) && !empty($qreate_option['responsive_hover_menu_color'])) {
				$inline_css .= '@media (max-width: 1199px){
					header .navbar ul.navbar-nav > li.menu-item:hover > a {
					color : ' . $qreate_option['responsive_hover_menu_color'] . ' !important;
                }
            }';
			}

			if (isset($qreate_option['responsive_menu_bg_color']) && !empty($qreate_option['responsive_menu_bg_color'])) {
				$inline_css .= '@media (max-width: 1199px){
					header .navbar ul li:hover > a,header .navbar ul li:hover > svg{
                    background : ' . $qreate_option['responsive_menu_bg_color'] . ' !important;
                }
            }';
			}
			if (isset($qreate_option['responsive_active_menu_bg_color']) && !empty($qreate_option['responsive_active_menu_bg_color'])) {
				$inline_css .= '@media (max-width: 1199px){
					header .navbar ul > li.current-menu-ancestor > a, header .navbar ul li.current-menu-parent > a, header .navbar ul li .sub-menu li.current-menu-item a{
                    background : ' . $qreate_option['responsive_active_menu_bg_color'] . ' !important;
                }
            }';
			}
		}
		wp_add_inline_style('qreate-global', $inline_css);
	}

	public function qreate_action_btn_color_options()
	{
		$qreate_option = get_option('qreate-options');
		$inline_css = '';

		if (isset($qreate_option['button_color']) && $qreate_option['button_color'] == 'custom') {
			if (isset($qreate_option['button_bg_color']) && !empty($qreate_option['button_bg_color'])) {
				$inline_css .= '
				.search_count #btn-search, .search_count #btn-search svg{
                color : ' . $qreate_option['button_bg_color'] . ' !important;
            }';
			}
		}

		if (!empty($inline_css)) {
			wp_add_inline_style('qreate-global', $inline_css);
		}
	}

	public function qreate_header_social_dynamic_style()
	{
		$qreate_option = get_option('qreate-options');
		$inline_css = '';

		if (isset($qreate_option['header_social_color_type'])) {
			if (isset($qreate_option['header_social_color_type']) && $qreate_option['header_social_color_type'] == 'custom') {

				if (!empty($qreate_option['header_social_icon_color'])) {
					$inline_css .= '.header-style-2 .qreate-header-wrapper .social-icone ul li a{
							color : ' . $qreate_option['header_social_icon_color'] . '!important;
						}';
				}
				if (!empty($qreate_option['header_social_icon_hover_color'])) {
					$inline_css .= '.header-style-2 .qreate-header-wrapper .social-icone ul li a:hover{
							color : ' . $qreate_option['header_social_icon_hover_color'] . '!important;
						}';
				}
			}
		}

		wp_add_inline_style('qreate-global', $inline_css);
	}
}
