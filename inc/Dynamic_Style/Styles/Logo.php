<?php
/**
 * qreate\qreate\Dynamic_Style\Styles\Logo class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class Logo extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'qreate_logo_options'), 20);
	}

	public function qreate_logo_options(){
        $qreate_options = get_option('qreate-options');
        $logo_var = '';
        if($qreate_options['header_radio'] == 1){
            if(isset($qreate_options['header_color'])){
                $logo = $qreate_options['header_color'];
                $logo_var .= "
                header .navbar-brand {
                    color : $logo !important;
                }";
            }  
        }          
        wp_add_inline_style( 'qreate-global', $logo_var );
    }
}
