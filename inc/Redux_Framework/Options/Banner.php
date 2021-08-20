<?php

/**
 * qreate\qreate\Redux_Framework\Options\Banner class
 *
 * @package qreate
 */

namespace qreate\qreate\Redux_Framework\Options;

use Redux;
use qreate\qreate\Redux_Framework\Component;

class Banner extends Component
{

    public function __construct()
    {
        $this->set_widget_option();
    }

    protected function set_widget_option()
    {
        Redux::set_section($this->opt_name, array(
            'title' => esc_html__('Page Banner Setting', 'qreate'),
            'id' => 'banner',
            'icon' => 'el el-cog',
            'desc' => esc_html__('This section contains options for Page Breadcrumbs Area.', 'qreate'),
            'fields' => array(
                array(
                    'id'       => 'page_default_banner_image',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => esc_html__('Default Banner Image', 'qreate'),
                    'read-only' => false,
                    'subtitle' => esc_html__('Upload default banner image for your Website. Default will be blank.', 'qreate').'<b>'.esc_html__("(Note:Only Display Banner Style Second & Third)","qreate").'</b>',
                ),
                array(
                    'id'      => 'bg_image',
                    'type'    => 'image_select',
                    'title'   => esc_html__('Select Banner Style', 'qreate'),
                    'subtitle' => esc_html__('Select the style that best fits your needs.', 'qreate'),
                    'options' => array(
                        '1'      => array(
                            'alt' => 'Style1',
                            'img' => get_template_directory_uri() . '/assets/images/redux/bg-1.jpg',
                        ),
                        '2'      => array(
                            'alt' => 'Style2',
                            'img' => get_template_directory_uri() . '/assets/images/redux/bg-2.jpg',
                        ),
                        '3'      => array(
                            'alt' => 'Style3',
                            'img' => get_template_directory_uri() . '/assets/images/redux/bg-3.jpg',
                        ),
                        '4'      => array(
                            'alt' => 'Style4',
                            'img' => get_template_directory_uri() . '/assets/images/redux/bg-4.jpg',
                        ),
                        '5'      => array(
                            'alt' => 'Style5',
                            'img' => get_template_directory_uri() . '/assets/images/redux/bg-5.jpg',
                        ),
                    ),
                    'default' => '1'
                ),




                array(
                    'id' => 'display_banner',
                    'type' => 'button_set',
                    'title' => esc_html__('Display Banner on inner Pages', 'qreate'),
                    'options' => array(
                        'yes' => esc_html__('Yes', 'qreate'),
                        'no' => esc_html__('No', 'qreate')
                    ),
                    'default' => esc_html__('yes', 'qreate')
                ),

                array(
                    'id' => 'display_breadcrumbs',
                    'type' => 'button_set',
                    'title' => esc_html__('Display Breadcrumbs on Banner', 'qreate'),
                    'options' => array(
                        'yes' => esc_html__('Yes', 'qreate'),
                        'no' => esc_html__('No', 'qreate')
                    ),
                    'required' => array(
                        'display_banner',
                        '=',
                        'yes'
                    ),
                    'default' => esc_html__('yes', 'qreate')
                ),

                array(
                    'id' => 'display_title',
                    'type' => 'button_set',
                    'title' => esc_html__('Display Breadcrumbs on Title', 'qreate'),
                    'options' => array(
                        'yes' => esc_html__('Yes', 'qreate'),
                        'no' => esc_html__('No', 'qreate')
                    ),
                    'required' => array(
                        'display_banner',
                        '=',
                        'yes'
                    ),
                    'default' => esc_html__('yes', 'qreate')
                ),


                array(
                    'id' => 'breadcum_title_tag',
                    'type' => 'select',
                    'title' => __('Select Breadcrumbs Title Tag', 'qreate'),
                    'options' => array(
                        'h1' => 'h1',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h5' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6'

                    ),
                    'required' => array(
                        'display_title',
                        '=',
                        'yes'
                    ),
                    'default' => 'h2'
                ),

                array(
                    'id' => 'bg_title_color',
                    'type' => 'color',
                    'title' => esc_html__('Set Title Color', 'qreate'),
                    'default'       => '',
                    'mode' => 'background',
                    'required' => array(
                        'display_title',
                        '=',
                        'yes'
                    ),
                    'transparent' => false
                ),

                array(
                    'id'       => 'bg_type',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Banner Background Type', 'qreate'),
                    'options'  => array(
                        '1' => 'Color',
                        '2' => 'Image'
                    ),
                    'default'  => '1'
                ),

                array(
                    'id'       => 'banner_image',
                    'type'     => 'media',
                    'url'      => false,
                    'title'    => esc_html__('Set Body Image', 'qreate'),
                    'read-only' => false,
                    'required'  => array('bg_type', '=', '2'),
                    'subtitle' => esc_html__('Upload Image for your body.', 'qreate'),
                    'default'  => array('url' => get_template_directory_uri() . '/assets/images/redux/banner.png'),
                ),

                array(
                    'id'            => 'bg_color',
                    'type'          => 'color',
                    'title'         => esc_html__('Set Background Color', 'qreate'),
                    'required'  => array('bg_type', '=', '1'),
                    'mode'          => 'background',
                    'transparent'   => false
                ),

                array(
                    'id'       => 'bg_opacity',
                    'type'     => 'button_set',
                    'title'    => esc_html__( 'Background Opacity Color', 'qreate' ),
                    'required' => array( 
                        array('bg_type','!=','1') 
                    ),
                    'subtitle' => esc_html__( 'Select this option for Background Opacity Color.', 'qreate' ),
                    'options'  => array(
                        '1' => 'None',
                        '2' => 'Dark',
                        '3' => 'Custom'
                    ),
                    'default'  => '1'
                ),
        
        
                array(
                    'id'            => 'opacity_color',
                    'type'          => 'color_rgba',
                    'title'         => esc_html__( 'Background Gradient Color', 'qreate' ),
                    'required'  => array( 'bg_opacity', '=', '3' ),
                    'subtitle'      => esc_html__( 'Choose body Gradient background color', 'qreate' ),
                    'transparent'   => false
                ),
        
            )
        ));
    }
}
