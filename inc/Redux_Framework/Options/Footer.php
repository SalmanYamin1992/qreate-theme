<?php

/**
 * qreate\qreate\Redux_Framework\Options\Footer class
 *
 * @package qreate
 */

namespace qreate\qreate\Redux_Framework\Options;

use Redux;
use qreate\qreate\Redux_Framework\Component;

class Footer extends Component
{

	public function __construct()
	{
		$this->set_widget_option();
	}

	protected function set_widget_option()
	{
		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Footer', 'qreate'),
			'id' => 'footer',
			'icon' => 'el el-arrow-down',
			'customizer_width' => '500px',
		));

		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Footer Image', 'qreate'),
			'id' => 'footer-logo',
			'subsection' => true,
			'desc' => esc_html__('This section contains options for footer.', 'qreate'),
			'fields' => array(

				array(
					'id' => 'display_footer_bg_image',
					'type' => 'button_set',
					'title' => esc_html__('Display Footer Background Image', 'qreate'),
					'subtitle' => esc_html__('Display Footer Background Image On All page', 'qreate'),
					'options' => array(
						'yes' => esc_html__('Yes', 'qreate'),
						'no' => esc_html__('No', 'qreate')
					),
					'default' => 'no'
				),

				array(
					'id' => 'display_footer_logo',
					'type' => 'button_set',
					'title' => esc_html__('Display Footer Logo', 'qreate'),
					'subtitle' => esc_html__('Display Footer Logo On All page', 'qreate'),
					'options' => array(
						'yes' => esc_html__('Yes', 'qreate'),
						'no' => esc_html__('No', 'qreate')
					),
					'default' => 'yes'
				),

				array(
					'id'       => 'logo_footer',
					'type'     => 'media',
					'url'      => false,
					'title'    => esc_html__('Footer Logo', 'qreate'),
					'read-only' => false,
					'required' => array('display_footer_logo', '=', 'yes'),
					'subtitle' => esc_html__('Upload Footer Logo for your Website.', 'qreate'),
					'default'  => array('url' => get_template_directory_uri() . '/assets/images/logo.svg'),
				),

				array(
					'id' => 'footer_bg_image',
					'type' => 'media',
					'url' => false,
					'title' => esc_html__('Footer Background Image', 'qreate'),
					'required' => array('display_footer_bg_image', '=', 'yes'),
					'read-only' => false,
					'subtitle' => esc_html__('Upload Footer image for your Website.', 'qreate'),
					'default' => array('url' => get_template_directory_uri() . '/assets/images/redux/footer-img.jpg'),
				),

				array(
					'id' => 'change_footer_color',
					'type' => 'button_set',
					'title' => esc_html__('Change Footer Color', 'qreate'),
					'subtitle' => esc_html__('Turn on to Change Footer Background Color', 'qreate'),
					'options' => array(
						'0' => esc_html__('Yes', 'qreate'),
						'1' => esc_html__('No', 'qreate')
					),
					'default' => '1'
				),

				array(
					'id' => 'footer_bg_color',
					'type' => 'color',
					'subtitle' => esc_html__('Choose Footer Background Color', 'qreate'),
					'required' => array('change_footer_color', '=', '0'),
					'mode' => 'background',
					'transparent' => false
				),

			)
		));

		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Footer Option', 'qreate'),
			'id' => 'footer_section',
			'subsection' => true,
			'desc' => esc_html__('This section contains options for footer.', 'qreate'),
			'fields' => array(

				array(
					'id' => 'footer_top',
					'type' => 'button_set',
					'title' => esc_html__('Display Footer Top', 'qreate'),
					'subtitle' => esc_html__('Display Footer Top On All page', 'qreate'),
					'options' => array(
						'yes' => esc_html__('Yes', 'qreate'),
						'no' => esc_html__('No', 'qreate')
					),
					'default' => esc_html__('yes', 'qreate')
				),

				array(
					'id' => 'qreate_footer_width',
					'type' => 'image_select',
					'title' => esc_html__('Footer Layout Type', 'qreate'),
					'required' => array('footer_top', '=', 'yes'),
					'subtitle' => wp_kses(__('<br />Choose among these structures (1column, 2column and 3column) for your footer section.<br />To fill these column sections you should go to appearance > widget.<br />And add widgets as per your needs.', 'qreate'), array('br' => array())),
					'options' => array(
						'1' => array('title' => esc_html__('Footer Layout 1', 'qreate'), 'img' => get_template_directory_uri() . '/assets/images/redux/footer_first.png'),
						'2' => array('title' => esc_html__('Footer Layout 2', 'qreate'), 'img' => get_template_directory_uri() . '/assets/images/redux/footer_second.png'),
						'3' => array('title' => esc_html__('Footer Layout 3', 'qreate'), 'img' => get_template_directory_uri() . '/assets/images/redux/footer_third.png'),
						'4' => array('title' => esc_html__('Footer Layout 4', 'qreate'), 'img' => get_template_directory_uri() . '/assets/images/redux/footer_four.png'),
						'5' => array('title' => esc_html__('Footer Layout 5', 'qreate'), 'img' => get_template_directory_uri() . '/assets/images/redux/footer_five.png'),
					),
					'default' => '4',
				),

				array(
					'id' => 'footer_one',
					'type' => 'select',
					'title' => esc_html__('Select 1 Footer Alignment', 'qreate'),
					'required' => array('footer_top', '=', 'yes'),
					'options' => array(
						'1' => 'Left',
						'2' => 'Right',
						'3' => 'Center',
					),
					'default' => '1',
				),

				array(
					'id' => 'footer_two',
					'type' => 'select',
					'title' => esc_html__('Select 2 Footer Alignment', 'qreate'),
					'required' => array('footer_top', '=', 'yes'),
					'options' => array(
						'1' => 'Left',
						'2' => 'Right',
						'3' => 'Center',
					),
					'default' => '1',
				),

				array(
					'id' => 'footer_three',
					'type' => 'select',
					'title' => esc_html__('Select 3 Footer Alignment', 'qreate'),
					'required' => array('footer_top', '=', 'yes'),
					'options' => array(
						'1' => 'Left',
						'2' => 'Right',
						'3' => 'Center',
					),
					'default' => '1',
				),

				array(
					'id' => 'footer_four',
					'type' => 'select',
					'title' => esc_html__('Select 4 Footer Alignment', 'qreate'),
					'required' => array('footer_top', '=', 'yes'),
					'options' => array(
						'1' => 'Left',
						'2' => 'Right',
						'3' => 'Center',
					),
					'default' => '1',
				),
			)
		));

		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Footer Copyright', 'qreate'),
			'id' => 'footer_copyright',
			'subsection' => true,
			'fields' => array(

				array(
					'id' => 'display_copyright',
					'type' => 'button_set',
					'title' => esc_html__('Display Copyrights', 'qreate'),
					'options' => array(
						'yes' => esc_html__('Yes', 'qreate'),
						'no' => esc_html__('No', 'qreate')
					),
					'default' => esc_html__('yes', 'qreate')
				),

				array(
					'id' => 'footer_copyright_align',
					'type' => 'select',
					'title' => esc_html__('Copyrights Alignment', 'qreate'),
					'required' => array('display_copyright', '=', 'yes'),
					'options' => array(
						'left' => 'Left',
						'right' => 'Right',
						'center' => 'Center',
					),
					'default' => 'right',
				),

				array(
					'id' => 'footer_copyright',
					'type' => 'editor',
					'required' => array('display_copyright', '=', 'yes'),
					'title' => esc_html__('Copyrights Text', 'qreate'),
					'default' => esc_html__('© 2021 Qreate. All Rights Reserved.', 'qreate'),
				),
			)
		));


	}
}
