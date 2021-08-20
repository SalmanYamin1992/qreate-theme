<?php
/**
 * qreate\qreate\Redux_Framework\Options\Blog class
 *
 * @package qreate
 */

namespace qreate\qreate\Redux_Framework\Options;

use Redux;
use qreate\qreate\Redux_Framework\Component;

class Blog extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section( $this->opt_name, array(
			'title' => esc_html__( 'Blog', 'qreate' ),
			'id'    => 'blog',
			'icon'  => 'el el-quotes',
			'customizer_width' => '500px',
		) );

		Redux::set_section( $this->opt_name, array(
			'title' => esc_html__('General Blogs','qreate'),
			'id'    => 'blog-section',
			'subsection' => true,
			'desc'  => esc_html__('This section contains options for blog.','qreate'),
			'fields'=> array(

				array(
					'id'       => 'blog_default_banner_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Blog Page Default Banner Image','qreate'),
					'read-only'=> false,
					'subtitle' => esc_html__( 'Upload banner image for your Website. Otherwise blank field will be displayed in place of this section.','qreate').'<b>'.esc_html__("(Note:Only Display Banner Style Second & Third in Page Banner Setting)","qreate").'</b>',
				),

				array(
					'id'        => 'blog_setting',
					'type'      => 'image_select',
					'title'     => esc_html__( 'Blog page Setting','qreate' ),
					'subtitle'  => wp_kses( __( '<br />Choose among these structures (Right Sidebar, Left Sidebar, 1column, 2column and 3column) for your blog section.<br />To filling these column sections you should go to appearance > widget.<br />And put every widget that you want in these sections.','qreate' ), array( 'br' => array() ) ),
					'options'   => array(
						'1' => array( 'title' => esc_html__( 'One Columns','qreate' ), 'img' => get_template_directory_uri() . '/assets/images/redux//single-column.jpg' ),
						'2' => array( 'title' => esc_html__( 'Two Columns','qreate' ), 'img' => get_template_directory_uri() . '/assets/images/redux//two-column.jpg' ),
						'3' => array( 'title' => esc_html__( 'Three Columns','qreate' ), 'img' => get_template_directory_uri() . '/assets/images/redux//three-column.jpg' ),
						'4' => array( 'title' => esc_html__( 'Right Sidebar','qreate' ), 'img' => get_template_directory_uri() . '/assets/images/redux//right-side.jpg' ),
						'5' => array( 'title' => esc_html__( 'Left Sidebar','qreate' ), 'img' => get_template_directory_uri() . '/assets/images/redux//left-side.jpg' ),
					),
					'default'   => '4',
				),

				array(
					'id'        => 'display_pagination',
					'type'      => 'button_set',
					'title'     => esc_html__( 'Previous/Next Pagination','qreate'),
					'subtitle' => esc_html__( 'Turn on to display the previous/next post pagination for blog page.','qreate'),
					'options'   => array(
						'yes' => esc_html__('On','qreate'),
						'no' => esc_html__('Off','qreate')
					),
					'default'   => 'yes'
				),

				array(
					'id'        => 'display_featured_image',
					'type'      => 'button_set',
					'title'     => esc_html__( 'Featured Image on Blog Archive Page','qreate'),
					'subtitle' => esc_html__( 'Turn on to display featured images on the blog or archive pages.','qreate'),
					'options'   => array(
						'yes' => esc_html__('On','qreate'),
						'no' => esc_html__('Off','qreate')
					),
					'default'   => 'yes'
				),
			)
		));

		Redux::set_section( $this->opt_name, array(
				'title'      => esc_html__( 'Blog Single Post', 'qreate' ),
				'id'         => 'basic',
				'subsection' => true,
				'fields'     => array(

					array(
						'id'        => 'blog_single_page_setting',
						'type'      => 'image_select',
						'title'     => esc_html__( 'Blog Single page Setting','qreate' ),
						'subtitle'  => wp_kses( __( '<br />Choose among these structures (Right Sidebar, Left Sidebar and 1column) for your blog section.<br />To filling these column sections you should go to appearance > widget.<br />And put every widget that you want in these sections.','qreate' ), array( 'br' => array() ) ),
						'options'   => array(
							'1' => array( 'title' => esc_html__( 'Full Width','qreate' ), 'img' => get_template_directory_uri() . '/assets/images/redux/single-column.jpg' ),
							'4' => array( 'title' => esc_html__( 'Right Sidebar','qreate' ), 'img' => get_template_directory_uri() . '/assets/images/redux/right-side.jpg' ),
							'5' => array( 'title' => esc_html__( 'Left Sidebar','qreate' ), 'img' => get_template_directory_uri() . '/assets/images/redux/left-side.jpg' ),
						),
						'default'   => '4',
					),

					array(
						'id'        => 'display_comment',
						'type'      => 'button_set',
						'title'     => esc_html__( 'Comments','qreate'),
						'subtitle' => esc_html__( 'Turn on to display comments.','qreate'),
						'options'   => array(
							'yes' => esc_html__('On','qreate'),
							'no' => esc_html__('Off','qreate')
						),
						'default'   => 'yes'
					),

				))
		);

	}
}
