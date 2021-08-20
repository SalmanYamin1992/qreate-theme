<?php
/**
 * qreate\qreate\Jetpack\Component class
 *
 * @package qreate
 */

namespace qreate\qreate\Redux_Framework\Options;

use Redux;
use qreate\qreate\Redux_Framework\Component;

class AdditionalCode extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section( $this->opt_name, array(
			'title' => __( 'Additional Code', 'qreate' ),
			'id'    => 'additional-Code',
			'icon'  => 'el el-css',
			'desc'  => esc_html__('This section contains options for header.','qreate'),
			'fields'=> array(

				array(
					'id'       => 'css_code',
					'type'     => 'ace_editor',
					'title'    => esc_html__('CSS Code','qreate'),
					'subtitle' => esc_html__('Paste your css code here.','qreate'),
					'mode'     => 'css',
					'desc'     => esc_html__('Paste your custom CSS code here.','qreate'),
				),

				array(
					'id'       => 'js_code',
					'type'     => 'ace_editor',
					'title'    => esc_html__('JS Code','qreate'),
					'subtitle' => esc_html__('Paste your js code in footer.','qreate'),
					'mode'     => 'javascript',
					'theme'   => 'chrome',
					'desc'     => esc_html__('Paste your custom JS code here.','qreate'),
					'default' => "jQuery(document).ready(function($){\n\n});"
				),
			)
		));
	}
}
