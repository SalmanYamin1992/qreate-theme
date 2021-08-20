<?php

/**
 * qreate\qreate\Redux_Framework\Options\General class
 *
 * @package qreate
 */

namespace qreate\qreate\Redux_Framework\Options;

use Redux;
use qreate\qreate\Redux_Framework\Component;

class Header extends Component
{

	public function __construct()
	{
		$this->set_widget_option();
	}

	protected function set_widget_option()
	{
		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Header', 'qreate'),
			'id' => 'header',
			'icon' => 'el el-arrow-up',
			'customizer_width' => '500px',
		));

		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Menu Layout', 'qreate'),
			'id' => 'header_variation',
			'subsection' => true,
			'fields' => array(

				array(
					'id' => 'header_variation',
					'type' => 'section',
					'indent' => true
				),

				array(
					'id' => 'menu_style',
					'type' => 'image_select',
					'title' => esc_html__('Header Style', 'qreate'),
					'subtitle' => esc_html__('Select the design variation that you want to use for site menu.', 'qreate'),
					'options' => array(
						'1' => array(
							'alt' => 'Style1',
							'img' => get_template_directory_uri() . '/assets/images/redux/header-1.png',
						),
						'2' => array(
							'alt' => 'Style2',
							'img' => get_template_directory_uri() . '/assets/images/redux/header-2.png',
						),
					),
					'default' => '2'
				),

				array(
					'id' => 'header_container',
					'type' => 'button_set',
					'title' => esc_html__('Header container', 'qreate'),
					'options' => array(
						'container-fluid' => esc_html__('full width', 'qreate'),
						'container' => esc_html__('Container', 'qreate'),
					),
					'default' => esc_html__('container', 'qreate'),
					'required' => array('menu_style', '=', '1'),
				),

				// --------main header background options start----------//

				array(
					'id' => 'qreate_header_background_type',
					'type' => 'button_set',
					'title' => esc_html__('Background', 'qreate'),
					'subtitle' => esc_html__('Select the variation for header background', 'qreate'),
					'options' => array(
						'default' => esc_html__('Default', 'qreate'),
						'color' => esc_html__('Color', 'qreate'),
						'image' => esc_html__('Image', 'qreate'),
						'transparent' => esc_html__('Transparent', 'qreate')
					),
					'default' => esc_html__('default', 'qreate')
				),

				array(
					'id' => 'qreate_header_background_color',
					'type' => 'color',
					'desc' => esc_html__('Set Background Color', 'qreate'),
					'required' => array('qreate_header_background_type', '=', 'color'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'qreate_header_background_image',
					'type' => 'media',
					'url' => false,
					'desc' => esc_html__('Upload Image', 'qreate'),
					'required' => array('qreate_header_background_type', '=', 'image'),
					'read-only' => false,
					'subtitle' => esc_html__('Upload background image for header.', 'qreate'),
				),

				// --------main header Background options end----------//

				// --------main header Menu options start----------//
				array(
					'id' => 'menu_color',
					'type' => 'button_set',
					'title' => esc_html__('Menu Color Options', 'qreate'),
					'subtitle' => esc_html__('Select Menu color .', 'qreate'),
					'options' => array(
						'default' => esc_html__('Default', 'qreate'),
						'custom' => esc_html__('Custom', 'qreate'),
					),
					'default' => esc_html__('default', 'qreate')
				),
				array(
					'id' => 'header_menu_color',
					'type' => 'color',
					'required' => array('menu_color', '=', 'custom'),
					'desc' => esc_html__('Menu Color', 'qreate'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'active_menu_color',
					'type' => 'color',
					'required' => array('menu_color', '=', 'custom'),
					'desc' => esc_html__('Active Menu Color', 'qreate'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'hover_menu_color',
					'type' => 'color',
					'required' => array('menu_color', '=', 'custom'),
					'desc' => esc_html__('Menu Hover Color', 'qreate'),
					'mode' => 'background',
					'transparent' => false
				),

				//----sub menu options start---//
				array(
					'id' => 'header_submenu_color_type',
					'type' => 'button_set',
					'title' => esc_html__('Submenu Color Options', 'qreate'),
					'subtitle' => esc_html__('Select submenu color.', 'qreate'),
					'options' => array(
						'default' => esc_html__('Default', 'qreate'),
						'custom' => esc_html__('Custom', 'qreate'),
					),
					'default' => esc_html__('default', 'qreate')
				),

				array(
					'id' => 'submenu_color',
					'type' => 'color',
					'desc' => esc_html__('Submenu Color', 'qreate'),
					'required' => array('header_submenu_color_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'active_submenu_color',
					'type' => 'color',
					'desc' => esc_html__('Active Submenu Color', 'qreate'),
					'required' => array('header_submenu_color_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'hover_submenu_color',
					'type' => 'color',
					'desc' => esc_html__('Submenu Hover Color', 'qreate'),
					'required' => array('header_submenu_color_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),

				//----sub menu options end----//

				// --------main header responsive Menu Button Options start----------//
				array(
					'id' => 'responsive_menu_button_type',
					'type' => 'button_set',
					'title' => esc_html__('Responsive Menu Color', 'qreate'),
					'subtitle' => esc_html__('Select menu color for responsive mode.', 'qreate'),
					'options' => array(
						'default' => esc_html__('Default', 'qreate'),
						'custom' => esc_html__('Custom', 'qreate')
					),
					'default' => esc_html__('default', 'qreate')
				),


				array(
					'id' => 'burger_menu_icon',
					'type' => 'color',
					'desc' => esc_html__('Toggle Icon color', 'qreate'),
					'required' => array('responsive_menu_button_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'burger_menu_popup_bg',
					'type' => 'color',
					'desc' => esc_html__('Model Background color', 'qreate'),
					'required' => array('responsive_menu_button_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'responsive_menu_color',
					'type' => 'color',
					'desc' => esc_html__('Responsive menu color', 'qreate'),
					'required' => array('responsive_menu_button_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'responsive_hover_menu_color',
					'type' => 'color',
					'desc' => esc_html__('Responsive menu hover color', 'qreate'),
					'required' => array('responsive_menu_button_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'responsive_active_menu_color',
					'type' => 'color',
					'desc' => esc_html__('Responsive menu active color', 'qreate'),
					'required' => array('responsive_menu_button_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'responsive_menu_bg_color',
					'type' => 'color',
					'desc' => esc_html__('Responsive menu background Hover color', 'qreate'),
					'required' => array('responsive_menu_button_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'responsive_active_menu_bg_color',
					'type' => 'color',
					'desc' => esc_html__('Responsive menu active background color', 'qreate'),
					'required' => array('responsive_menu_button_type', '=', 'custom'),
					'mode' => 'background',
					'transparent' => false
				),
				// --------main header responsive Menu Button Options end----------//

				// --------main header Search Options start----------//
				array(
					'id' => 'header_display_button',
					'type' => 'button_set',
					'title' => esc_html__('Display Search Icon', 'qreate'),
					'subtitle' => esc_html__('Turn on to display the Search in header.', 'qreate'),
					'options' => array(
						'yes' => esc_html__('On', 'qreate'),
						'no' => esc_html__('Off', 'qreate')
					),
					'default' => esc_html__('yes', 'qreate'),
					'required'  => array('menu_style', '=', '2'),
				),

				array(
					'id' => 'button_color',
					'type' => 'button_set',
					'required' => array('header_display_button', '=', 'yes'),
					'title' => esc_html__('Search Icon', 'qreate'),
					'subtitle' => esc_html__('Turn on to display the Search color in header.', 'qreate'),
					'options' => array(
						'default' => esc_html__('Default', 'qreate'),
						'custom' => esc_html__('Custom', 'qreate')
					),
					'default' => esc_html__('default', 'qreate')
				),

				array(
					'id' => 'button_bg_color',
					'type' => 'color',
					'desc' => esc_html__('Icon color', 'qreate'),
					'required' => array('button_color', '=', 'custom'),
					'desc' => esc_html__('Select for button color options.', 'qreate'),
					'mode' => 'background',
					'transparent' => false
				),
				//shop page options
				array(
					'id'        => 'header_display_shop',
					'type'      => 'button_set',
					'title'     => esc_html__('Shop & Wishlist Button', 'qreate'),
					'subtitle' => esc_html__('Turn on to display Shop & Wishlist Button in header.', 'qreate'),
					'options'   => array(
						'yes' => esc_html__('Yes', 'qreate'),
						'no' => esc_html__('No', 'qreate')
					),
					'default'   => esc_html__('no', 'qreate')
				),

				array(
					'id'       => 'wishlist_link',
					'type'     => 'select',
					'multi'    => false,
					'data'     => 'pages',
					'required'  => array('header_display_shop', '=', 'yes'),
					'title'    => __('Choose Wishlist Page', 'qreate'),
					'subtitle' => __('Select Page that you want to display wishlist items', 'qreate'),
				),

				// --------main header Search Options end----------//

				// --------header Social Media options start----------//
				array(
					'id'        => 'qreate_header_social_media',
					'type'      => 'button_set',
					'title'     => esc_html__('Social Media', 'qreate'),
					'subtitle' => esc_html__('Turn on to display Social Media in header.', 'qreate'),
					'required'  => array('menu_style', '=', '2'),
					'options'   => array(
						'yes' => esc_html__('Yes', 'qreate'),
						'no' => esc_html__('No', 'qreate')
					),
					'default'   => 'yes'
				),


				array(
					'id'        => 'header_social_color_type',
					'type'      => 'button_set',
					'required'  => array(
						array('menu_style', 'equals', '2'),
						array('qreate_header_social_media', 'equals', 'yes'),
					),
					'title'     => esc_html__('Icon color options', 'qreate'),
					'subtitle' => esc_html__('Select icon color for normal and hover .', 'qreate'),
					'options'   => array(
						'default' => esc_html__('Default', 'qreate'),
						'custom' => esc_html__('Custom', 'qreate'),
					),
					'default'   => 'default'
				),

				array(
					'id'            => 'header_social_icon_color',
					'type'          => 'color',
					'desc'      => esc_html__('Choose Icon color for header.', 'qreate'),
					'required'  => array(
						array('header_social_color_type', 'equals', 'custom'),
						array('qreate_header_social_media', 'equals', 'yes'),
					),
					'mode'          => 'background',
					'transparent'   => false
				),

				array(
					'id'            => 'header_social_icon_hover_color',
					'type'          => 'color',
					'desc'      => esc_html__('Choose Icon hover color for header.', 'qreate'),
					'required'  => array(
						array('header_social_color_type', 'equals', 'custom'),
						array('qreate_header_social_media', 'equals', 'yes'),
					),
					'mode'          => 'background',
					'transparent'   => false
				),
				// --------header top Text color options end----------//



				//-----Sticky Header Options Start---//
				array(
					'id' => 'qreate_sticky-header-variation',
					'type' => 'section',
					'title' => esc_html__('Sticky Header', 'qreate'),
					'indent' => true,
					'required' => array('menu_style', '=', '1'),
				),


				array(
					'id' => 'display_sticky_header',
					'type' => 'button_set',
					'title' => esc_html__('Sticky Header', 'qreate'),
					'subtitle' => esc_html__('Turn on to display sticky header for responsive.', 'qreate'),
					'required' => array('menu_style', '=', '1'),
					'options' => array(
						'yes' => esc_html__('On', 'qreate'),
						'no' => esc_html__('Off', 'qreate')
					),
					'default' => 'yes'
				),
				// --------sticky header background options start----------//
				array(
					'id' => 'sticky_header_bg',
					'type' => 'button_set',
					'required' => array('display_sticky_header', '=', 'yes'),
					'title' => esc_html__('Background', 'qreate'),
					'subtitle' => esc_html__('Select the variation for sticky header background', 'qreate'),
					'options' => array(
						'default' => esc_html__('Default', 'qreate'),
						'color' => esc_html__('Color', 'qreate'),
						'image' => esc_html__('Image', 'qreate'),
						'transparent' => esc_html__('Transparent', 'qreate')
					),
					'default' => 'default'
				),

				array(
					'id' => 'sticky_header_bg_color',
					'type' => 'color',
					'desc' => esc_html__('Set Background Color', 'qreate'),
					'required' => array('sticky_header_bg', '=', 'color'),
					'mode' => 'background',
					'transparent' => false
				),

				array(
					'id' => 'sticky_header_bg_img',
					'type' => 'media',
					'url' => false,
					'desc' => esc_html__('Upload Image', 'qreate'),
					'required' => array('sticky_header_bg', '=', 'image'),
					'read-only' => false,
					'subtitle' => esc_html__('Upload background image for sticky header.', 'qreate'),
				),
				// --------sticky header Background options end----------//
			)
		));

		// //-----Sticky Header Options Start---//
		// Redux::set_section($this->opt_name, array(
		// 	'title' => esc_html__('Sticky Header', 'qreate'),
		// 	'id' => 'qreate_sticky-header-variation',
		// 	'subsection' => true,
		// 	'desc' => esc_html__('This section contains options for sticky header menu and background color.', 'qreate'),
		// 	'fields' => array(

		// 		array(
		// 			'id' => 'display_sticky_header',
		// 			'type' => 'button_set',
		// 			'title' => esc_html__('Sticky Header', 'qreate'),
		// 			'subtitle' => esc_html__('Turn on to display sticky header for responsive.', 'qreate'),
		// 			'required' => array('menu_style', '=', '1'),
		// 			'options' => array(
		// 				'yes' => esc_html__('On', 'qreate'),
		// 				'no' => esc_html__('Off', 'qreate')
		// 			),
		// 			'default' => 'yes'
		// 		),
		// 		// --------sticky header background options start----------//
		// 		array(
		// 			'id' => 'sticky_header_bg',
		// 			'type' => 'button_set',
		// 			'required' => array('display_sticky_header', '=', 'yes'),
		// 			'title' => esc_html__('Background', 'qreate'),
		// 			'subtitle' => esc_html__('Select the variation for sticky header background', 'qreate'),
		// 			'options' => array(
		// 				'default' => esc_html__('Default', 'qreate'),
		// 				'color' => esc_html__('Color', 'qreate'),
		// 				'image' => esc_html__('Image', 'qreate'),
		// 				'transparent' => esc_html__('Transparent', 'qreate')
		// 			),
		// 			'default' => 'default'
		// 		),

		// 		array(
		// 			'id' => 'sticky_header_bg_color',
		// 			'type' => 'color',
		// 			'desc' => esc_html__('Set Background Color', 'qreate'),
		// 			'required' => array('sticky_header_bg', '=', 'color'),
		// 			'mode' => 'background',
		// 			'transparent' => false
		// 		),

		// 		array(
		// 			'id' => 'sticky_header_bg_img',
		// 			'type' => 'media',
		// 			'url' => false,
		// 			'desc' => esc_html__('Upload Image', 'qreate'),
		// 			'required' => array('sticky_header_bg', '=', 'image'),
		// 			'read-only' => false,
		// 			'subtitle' => esc_html__('Upload background image for sticky header.', 'qreate'),
		// 		),
		// 		// --------sticky header Background options end----------//
		// 	)
		// ));
	}
}
