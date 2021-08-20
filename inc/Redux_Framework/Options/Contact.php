<?php
/**
 * qreate\qreate\Redux_Framework\Options\Contact class
 *
 * @package qreate
 */

namespace qreate\qreate\Redux_Framework\Options;

use Redux;
use qreate\qreate\Redux_Framework\Component;

class Contact extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Contact', 'qreate'),
			'id' => 'contact',
			'icon' => 'el el-map-marker',
			'fields' => array(

				array(
					'id' => 'address',
					'type' => 'textarea',
					'title' => esc_html__('Address', 'qreate'),
					'default' => esc_html__('1234 North Avenue Luke Lane, South Bend, IN 360001', 'qreate'),
				),

				array(
					'id' => 'phone',
					'type' => 'text',
					'title' => esc_html__('Phone', 'qreate'),
					'preg' => array(
						'pattern' => '/[^0-9_ -+()]/s',
						'replacement' => ''
					),
					'default' => esc_html__('+0123456789', 'qreate'),
				),

				array(
					'id' => 'email',
					'type' => 'text',
					'title' => esc_html__('Email', 'qreate'),
					'validate' => 'email',
					'msg' => esc_html__('custom error message', 'qreate'),
					'default' => esc_html__('support@example.com', 'qreate'),
				),
			)
		));
	}
}
