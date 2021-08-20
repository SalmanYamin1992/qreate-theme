<?php

/**
 * qreate\qreate\Dynamic_Style\Styles\Banner class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;
use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class Banner extends Component
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'qreate_banner_dynamic_style'), 20);
        add_action('wp_enqueue_scripts', array($this, 'qreate_opacity_color'), 20);
    }

    public function qreate_banner_dynamic_style()
    {
        $page_id = get_queried_object_id();
        $qreate_options = get_option('qreate-options');
        $dynamic_css = '';

        if (function_exists('get_field') && get_field('field_display_banner', $page_id) != 'default') {
            if (get_field('field_display_banner', $page_id) == 'no') {
                $dynamic_css .=
                    '.qreate-breadcrumb-one { display: none !important; }
                    .content-area .site-main {padding : 0 !important; }';
            }
        } else if (isset($qreate_options['display_banner'])) {
            if ($qreate_options['display_banner'] == 'no') {
                $dynamic_css .=
                    '.qreate-breadcrumb-one { display: none !important; }
                    .content-area .site-main {padding : 0 !important; }';
            }
        }

        $key = (function_exists('get_field')) ? get_field('field_display_breadcrumb', $page_id) : "";
        if (isset($key['display_title']) && $key['display_title'] != 'default'  && $key['display_title'] == 'no') {
            $dynamic_css .=
                '.qreate-breadcrumb-one .title { display: none !important; }';
        } else if (isset($qreate_options['display_title'])) {
            if ($qreate_options['display_title'] == 'no') {
                $dynamic_css .=
                    '.qreate-breadcrumb-one .title { display: none !important; }';
            }
        }

        if (isset($key['display_breadcumb']) && $key['display_breadcumb'] != 'default'  && $key['display_breadcumb'] == 'no') {
            $dynamic_css .=
                '.qreate-breadcrumb-one .breadcrumb { display: none !important; }';
        } else if (isset($qreate_options['display_breadcumb'])) {

            if ($qreate_options['display_breadcumb'] == 'no') {
                $dynamic_css .=
                    '.qreate-breadcrumb-one .breadcrumb { display: none !important; }';
            }
        }

        if (isset($qreate_options['bg_title_color'])) {

            if ($qreate_options['bg_title_color'] == 'yes') {
                $dynamic = $qreate_options['bg_title_color'];
                $dynamic_css .=
                    '.qreate-breadcrumb-one .title { color: ' . $dynamic . ' !important; }';
            }
        }
        
        if (isset($qreate_options['bg_type'])) {
            $opt = $qreate_options['bg_type'];
            if ($opt == '1') {
                if (isset($qreate_options['bg_color']) && !empty($qreate_options['bg_color'])) {
                    $dynamic = $qreate_options['bg_color'];
                    $dynamic_css .=
                        '.qreate-breadcrumb-one { background: ' . $dynamic . ' !important; }';
                }
            }
            if ($opt == '2') {
                if (isset($qreate_options['banner_image']['url'])) {
                    $dynamic = $qreate_options['banner_image']['url'];
                    $dynamic_css .=
                        '.qreate-breadcrumb-one { background-image: url(' . $dynamic . ') !important; }';
                }
            }
        }

        wp_add_inline_style('qreate-global', $dynamic_css);
    }

    public function qreate_opacity_color()
    {
        //Set Background Opacity Color
        $qreate_options = get_option('qreate-options');

        if (!empty($qreate_options['bg_opacity']) && $qreate_options['bg_opacity'] == "3") {
            $bg_opacity = $qreate_options['opacity_color']['rgba'];
        }
        $dynamic_css = '';

        if (!empty($qreate_options['bg_opacity']) && $qreate_options['bg_opacity'] == "3") {
            if (!empty($bg_opacity) && $bg_opacity != '#ffffff') {
                $dynamic_css .= "
            .breadcrumb-video::before,.breadcrumb-bg::before, .breadcrumb-ui::before {
                background : $bg_opacity !important;
            }";
            }
        }
        wp_add_inline_style('qreate-global', $dynamic_css);
    }
}
