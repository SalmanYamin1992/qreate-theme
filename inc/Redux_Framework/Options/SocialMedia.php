<?php
/**
 * qreate\qreate\Redux_Framework\Options\SocialMedia class
 *
 * @package qreate
 */

namespace qreate\qreate\Redux_Framework\Options;
use Redux;
use qreate\qreate\Redux_Framework\Component;

class SocialMedia extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section( $this->opt_name, array(
			'title'            => esc_html__( 'Social Media', 'qreate' ),
			'id'               => 'social_link',
			'icon'             => 'el-icon-share',
			'fields'           => array(

				array(
					'id'       => 'social_media_options',
					'type'     => 'sortable',
					'title'    => esc_html__('Social Media Option', 'qreate'),
					'subtitle' => esc_html__('Enter social media url.', 'qreate'),
					'mode'     => 'text',
					'label'    => true,
					'options'  => array(
						'facebook'     => '',
						'twitter'        => '',
						'google-plus'  => '',
						'github'      	 => '',
						'instagram'      => '',
						'linkedin'       => '',
						'tumblr'         => '',
						'pinterest'      => '',
						'dribbble'       => '',
						'reddit'         => '',
						'flickr'         => '',
						'skype'          => '',
						'youtube'  		 => '',
						'vimeo'          => '',
						'soundcloud'     => '',
						'wechat'         => '',
						'renren'         => '',
						'weibo'          => '',
						'xing'           => '',
						'qq'             => '',
						'rss'            => '',
						'vk'             => '',
						'behance'        => '',
						'snapchat'       => '',
					),
				),

			),
		) );
	}
}
