<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qreate
 */

namespace qreate\qreate;

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <?php $qreate_option = get_option('qreate-options'); ?>
  <link rel="profile" href="<?php echo is_ssl() ? 'https:' : 'http:' ?>//gmpg.org/xfn/11">
  <?php
  if (!function_exists('has_site_icon') || !wp_site_icon()) {
  ?>
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/redux/favicon.ico'); ?>" />
  <?php
  }
  ?>
  <?php wp_head(); ?>
</head>

<?php
//--- class setting for vertical menu start---// 
$default_site_content = '';
$has_sticky = '';
if (class_exists('ReduxFramework')) {
  $default_site_content = 'qreate-marketing';
  if (isset($qreate_option['menu_style']) && isset($qreate_option['display_sticky_header']) && $qreate_option['menu_style'] == '1' && $qreate_option['display_sticky_header'] == 'yes') {
    $has_sticky .= ' has-sticky';
  }
} else {
  $has_sticky .= ' has-sticky';
}

?>
<?php
$key_body_bg_col = '';
if (function_exists('get_field')) {
  $page_id_body_col = get_queried_object_id();
  $key_body_bg_col = get_field('mode_variation', $page_id_body_col);
}
?>

<body <?php body_class($key_body_bg_col); ?>>
  <?php wp_body_open(); ?>
  <?php
  if (isset($qreate_option['display_loader'])) {
    $options = $qreate_option['display_loader'];

    if ($options == "yes") {
  ?>
      <!-- loading -->
      <div id="loading">
        <div id="loading-center">
          <?php
          if (!empty($qreate_option['loader_gif']['url'])) {
            $bgurl = $qreate_option['loader_gif']['url'];
          ?>
            <img src="<?php echo esc_url($bgurl); ?>" alt="<?php esc_attr_e('loader', 'qreate'); ?>">
          <?php
          } else {
            $bgurl = get_template_directory_uri() . '/assets/images/redux/loader.gif';
          ?>
            <img src="<?php echo esc_url($bgurl); ?>" alt="<?php esc_attr_e('loader', 'qreate'); ?>">
          <?php
          }
          ?>
        </div>
      </div>
      <!-- loading End -->
  <?php
    }
  }
  ?>
  <div id="page" class="site <?php echo esc_attr($default_site_content); ?>">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'qreate'); ?></a>
    <?php
    $qreate_container = '';
    if (isset($qreate_option['header_container']) && $qreate_option['header_container'] == 'container') {
      $qreate_container = 'container';
    } else {
      $qreate_container = 'container-fluid';
    }

    ?>
    <?php if (class_exists('ReduxFramework') && isset($qreate_option['menu_style']) && $qreate_option['menu_style'] == '2') {
      get_template_part('template-parts/header/verticle');
    } else { ?>
      <header id="main-header" class="site-header<?php echo esc_attr($has_sticky); ?>">
        <div class="<?php echo esc_attr($qreate_container); ?>">
          <div class="row">
            <div class="col-md-12">
              <?php
              get_template_part('template-parts/header/navigation');
              ?>
            </div>
          </div>
        </div>
      </header><!-- #masthead -->
    <?php } ?>
    <?php get_template_part('template-parts/breadcrumb/breadcrumb'); ?>