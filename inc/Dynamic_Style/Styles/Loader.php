<?php
/**
 * qreate\qreate\Dynamic_Style\Styles\Loader class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class Loader extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'qreate_loader_options'), 20);
	}

	public function qreate_loader_options(){
        $qreate_options = get_option('qreate-options');
        $loader_css = '';
        if(isset($qreate_options['loader_bg_color'])){
            $loader_var = $qreate_options['loader_bg_color'];
            if( !empty($loader_var) && $loader_var != '#ffffff') {
                $loader_css .= "
                #loading {
                    background : $loader_var !important;
                }"; 
            }
        }            
        wp_add_inline_style( 'qreate-global', $loader_css );
    }
}
