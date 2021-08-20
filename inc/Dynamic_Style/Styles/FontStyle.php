<?php
/**
 * qreate\qreate\Dynamic_Style\Styles\Banner class
 *
 * @package qreate
 */

namespace qreate\qreate\Dynamic_Style\Styles;

use qreate\qreate\Dynamic_Style\Component;
use function add_action;

class FontStyle extends Component
{

	public function __construct()
	{
			add_action('wp_enqueue_scripts', array($this, 'qreate_fontstyle_dynamic_style'), 20);
	}

    public function qreate_fontstyle_dynamic_style() {
    
            $font_dynamic_css = '';
    
            $qreate_options = get_option('qreate-options');
            $loader_width = '';
            $loader_height = '';
    
            if(!empty($qreate_options["logo-dimensions"]["width"])) { $logo_width = $qreate_options["logo-dimensions"]["width"]; }
            if(!empty($qreate_options["logo-dimensions"]["height"])) { $logo_height = $qreate_options["logo-dimensions"]["height"]; }
    
            if(!empty($qreate_options["vertical-logo-dimensions"]["width"])) { $vertical_logo_width = $qreate_options["vertical-logo-dimensions"]["width"]; }
            if(!empty($qreate_options["vertical-logo-dimensions"]["height"])) { $vertical_logo_height = $qreate_options["vertical-logo-dimensions"]["height"]; }
    
            if(!empty($qreate_options["loader_dimensions"]["width"])) {  $loader_width = $qreate_options["loader_dimensions"]["width"]; }
            if(!empty($qreate_options["loader_dimensions"]["height"])) { $loader_height = $qreate_options["loader_dimensions"]["height"]; }
         
            if(isset($qreate_options["body_font"]["font-family"])) { $body_family = $qreate_options["body_font"]["font-family"]; }
            if(isset($qreate_options["body_font"]["font-backup"])) { $body_backup = $qreate_options["body_font"]["font-backup"]; }
            if(isset($qreate_options["body_font"]["font-size"])){ $body_size = $qreate_options["body_font"]["font-size"]; }
            if(isset($qreate_options["body_font"]["font-weight"])){ $body_weight = $qreate_options["body_font"]["font-weight"]; }
    
            if(isset($qreate_options["h1_font"]["font-family"])) { $h1_family = $qreate_options["h1_font"]["font-family"]; }
            if(isset($qreate_options["h1_font"]["font-size"])) { $h1_size = $qreate_options["h1_font"]["font-size"]; }
            if(isset($qreate_options["h1_font"]["font-weight"])) { $h1_weight = $qreate_options["h1_font"]["font-weight"]; }
    
            if(isset($qreate_options["h2_font"]["font-family"])) { $h2_family = $qreate_options["h2_font"]["font-family"]; }
            if(isset($qreate_options["h2_font"]["font-size"])) { $h2_size = $qreate_options["h2_font"]["font-size"]; }
            if(isset($qreate_options["h2_font"]["font-weight"])) { $h2_weight = $qreate_options["h2_font"]["font-weight"]; }
    
            if(isset($qreate_options["h3_font"]["font-family"])) { $h3_family = $qreate_options["h3_font"]["font-family"]; }
            if(isset($qreate_options["h3_font"]["font-size"])) { $h3_size = $qreate_options["h3_font"]["font-size"]; }
            if(isset($qreate_options["h3_font"]["font-weight"])) { $h3_weight = $qreate_options["h3_font"]["font-weight"]; }
    
            if(isset($qreate_options["h4_font"]["font-family"])) { $h4_family = $qreate_options["h4_font"]["font-family"]; }
            if(isset($qreate_options["h4_font"]["font-size"])) { $h4_size = $qreate_options["h4_font"]["font-size"]; }
            if(isset($qreate_options["h4_font"]["font-weight"])) { $h4_weight = $qreate_options["h4_font"]["font-weight"]; }
    
            if(isset($qreate_options["h5_font"]["font-family"])) { $h5_family = $qreate_options["h5_font"]["font-family"]; }
            if(isset($qreate_options["h5_font"]["font-size"])) { $h5_size = $qreate_options["h5_font"]["font-size"]; }
            if(isset($qreate_options["h5_font"]["font-weight"])) { $h5_weight = $qreate_options["h5_font"]["font-weight"]; }
    
            if(isset($qreate_options["h6_font"]["font-family"])) { $h6_family = $qreate_options["h6_font"]["font-family"]; }
            if(isset($qreate_options["h6_font"]["font-size"])) { $h6_size = $qreate_options["h6_font"]["font-size"]; }
            if(isset($qreate_options["h6_font"]["font-weight"])) { $h6_weight = $qreate_options["h6_font"]["font-weight"]; }

            if(!empty($logo_width) && $logo_width != "px" ){
                $font_dynamic_css .= 'header.site-header a.navbar-brand img, .vertical-navbar-brand img { width: '. $logo_width .' !important; }';
            }
    
            if(!empty($logo_height) && $logo_height != "px"){
                $font_dynamic_css .= 'header.site-header a.navbar-brand img, .vertical-navbar-brand img { height: '. $logo_height .' !important; }';
            }
    
            if(!empty($vertical_logo_width)){
                $font_dynamic_css .= 'header.style-vertical a.navbar-brand img { width: '. $vertical_logo_width .' !important; }';
            }
    
            if(!empty($vertical_logo_height)){
                $font_dynamic_css .= 'header.style-vertical a.navbar-brand img { height: '. $vertical_logo_height .' !important; }';
                }
    
            if(!empty($loader_width)){
                $font_dynamic_css .= '#loading img { width: '. $loader_width .' !important; }';
            }
    
            if(!empty($loader_height)){
                $font_dynamic_css .= '#loading img { height: '. $loader_height .' !important; }';
            }
    
            if(!empty($qreate_options['header_radio']) && $qreate_options['header_radio'] == 1 ){
                if(!empty($header_font_family)){
                    $font_dynamic_css .= 'h1 { font-family: '. $header_font_family .' !important; }';
            }
    
            if(!empty($header_font_size)){
                $font_dynamic_css .= 'h1 { font-size: '. $header_font_size .' !important; }';
            }
    
            if(!empty($header_font_weight)){
                $font_dynamic_css .= 'h1 { font-weight: '. $header_font_weight .' !important; }';
            }
        }
    
            // Change font 1
            if( isset($qreate_options['change_font']) && $qreate_options['change_font'] == 1 ){
    
                // body
                $font_dynamic_css .= 'body { font-family: '. $body_family.  $body_backup .' !important; }';
                $font_dynamic_css .= 'body { font-size: '. $body_size .' !important; }';
                $font_dynamic_css .= 'body { font-weight: '. $body_weight .' !important; }';

                $font_dynamic_css .= 'h1 { font-family: '. $h1_family .' !important; }';
                $font_dynamic_css .= 'h1 { font-size: '. $h1_size .' !important; }';
                $font_dynamic_css .= 'h1 { font-weight: '. $h1_weight .' !important; }';

                $font_dynamic_css .= 'h2 { font-family: '. $h2_family .' !important; }';
                $font_dynamic_css .= 'h2 { font-size: '. $h2_size .' !important; }';
                $font_dynamic_css .= 'h2 { font-weight: '. $h2_weight .' !important; }';

                $font_dynamic_css .= 'h3 { font-family: '. $h3_family .' !important; }';
                $font_dynamic_css .= 'h3 { font-size: '. $h3_size .' !important; }';
                $font_dynamic_css .= 'h3 { font-weight: '. $h3_weight .' !important; }';

                $font_dynamic_css .= 'h4 { font-family: '. $h4_family .' !important; }';
                $font_dynamic_css .= 'h4 { font-size: '. $h4_size .' !important; }';
                $font_dynamic_css .= 'h4 { font-weight: '. $h4_weight .' !important; }';

                $font_dynamic_css .= 'h5 { font-family: '. $h5_family .' !important; }';
                $font_dynamic_css .= 'h5 { font-size: '. $h5_size .' !important; }';
                $font_dynamic_css .= 'h5 { font-weight: '. $h5_weight .' !important; }';

                $font_dynamic_css .= 'h6 { font-family: '. $h6_family .' !important; }';
                $font_dynamic_css .= 'h6 { font-size: '. $h6_size .' !important; }';
                $font_dynamic_css .= 'h6 { font-weight: '. $h6_weight .' !important; }';

            }
    
            wp_add_inline_style('qreate-global', $font_dynamic_css);
    }
}
