<?php

/**
 * qreate\qreate\Dynamic_Style\Styles\AdditionalCode class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class AdditionalCode extends Component
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'qreate_inline_css'), 20);
        add_action('wp_enqueue_scripts', array($this, 'qreate_inline_js'), 20);
    }

    public function qreate_inline_css()
    {
        $qreate_options = get_option('qreate-options');
        $custom_style = "";

        if (!empty($qreate_options['css_code'])) {

            $qreate_css_code = $qreate_options['css_code'];
            $custom_style = $qreate_css_code;
        }
        wp_add_inline_style('qreate-global', $custom_style);
    }

    public function qreate_inline_js()
    {
        $qreate_option = get_option('qreate-options');

        $custom_js = "";
        if (!empty($qreate_option['qreate_js_code'])) {

            $qreate_js_code = $qreate_option['qreate_js_code'];

            $custom_js = $qreate_js_code;
            wp_register_script('qreate-custom-js', '', [], '', true);
            wp_enqueue_script('qreate-custom-js');
            wp_add_inline_script('qreate-custom-js', wp_specialchars_decode($custom_js));
        }
    }
}
