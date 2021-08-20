<?php
/**
 * qreate\qreate\Redux_Framework\Options\Color class
 *
 * @package qreate
 */

namespace qreate\qreate\Redux_Framework\Options;

use Redux;
use qreate\qreate\Redux_Framework\Component;

class Color extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section( $this->opt_name, array(
			'title' => esc_html__( 'Color Attribute','qreate' ),
			'id'    => 'color',
			'icon'  => 'el el-brush',
			'desc'  => esc_html__('Change the default colors of your site.','qreate'),
			'fields'=> array(
				array(
					'id'       => 'custom_color_switch',
					'type'     => 'button_set',
					'title'    => esc_html__('Set Custom Color', 'qreate'),
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No',
					),
					'default' => 'no'
				),

				array(
					'id'            => 'primary_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Set Primary Color', 'qreate' ),
					'subtitle'      => esc_html__( 'Select primary accent color.', 'qreate' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),

				array(
					'id'            => 'secondary_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Set Secondary Color', 'qreate' ),
					'subtitle'      => esc_html__( 'Select secondary complementing color.', 'qreate' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),

				array(
					'id'            => 'title_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Title Color', 'qreate' ),
					'subtitle'      => esc_html__( 'Select default Title(Headings) color', 'qreate' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),


				array(
					'id'            => 'text_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Body Text Color', 'qreate' ),
					'subtitle'      => esc_html__( 'Select default body text color', 'qreate' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),

				
				array(
					'id'            => 'tertiary_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Tertiary Color', 'qreate' ),
					'subtitle'      => esc_html__( 'Select default Tertiary Background color', 'qreate' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),

				array(
					'id'            => 'light_tertiary_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Light Tertiary Color', 'qreate' ),
					'subtitle'      => esc_html__( 'Select default Light Tertiary Background color', 'qreate' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),
				
				
			)
		));
	}
}
