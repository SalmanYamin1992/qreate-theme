<?php

/**
 * Template part for displaying the header navigation menu
 *
 * @package qreate
 */

namespace qreate\qreate;

$qreate_options = get_option('qreate-options');
?>

<nav id="site-navigation" class="navbar default-nav navbar-expand-xl navbar-light p-0" aria-label="<?php esc_html_e('Main menu', 'qreate'); ?>" <?php
																																				if (qreate()->is_amp()) {
																																				?> [class]=" siteNavigationMenu.expanded ? 'main-navigation nav--toggle-sub nav--toggle-small nav--toggled-on' : 'main-navigation nav--toggle-sub nav--toggle-small' " <?php
																																																																										}
																																																																											?>>

	<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
		<?php
		if (function_exists('get_field') && class_exists('ReduxFramework')) {
			$qreate_options = get_option('qreate-options');
			$key = get_field('key_header');
			if (!empty($key['header_logo']['url'])) {
				$options = $key['header_logo']['url'];		?>
				<img class="img-fluid logo" src="<?php echo esc_url($options); ?>" alt="<?php esc_attr_e('qreate', 'qreate'); ?>">
				<?php
			} else if (isset($qreate_options['header_radio'])) {
				if ($qreate_options['header_radio'] == 1) {
					$options = $qreate_options['header_text'];
					echo esc_html($options);
				}
				if ($qreate_options['header_radio'] == 2) {
					$options = $qreate_options['qreate_logo']['url']; ?>
					<img class="img-fluid logo" src="<?php echo esc_url($options); ?>" alt="<?php esc_attr_e('qreate', 'qreate'); ?>">
				<?php }
			}
		} elseif (has_header_image()) {
			$image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
			if (has_custom_logo()) { ?>
				<img class="img-fluid logo" src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('qreate', 'qreate'); ?>">
			<?php } else { ?>
				<?php bloginfo('name'); ?>
			<?php }
		} else {
			?>
			<img class="img-fluid logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php esc_attr_e('qreate', 'qreate'); ?>">
		<?php } ?>
	</a>
	<?php if (qreate()->is_primary_nav_menu_active()) { ?>
		<button type="button" class="navbar-toggler" data-toggle="collapse" aria-label="<?php esc_html_e('Open menu', 'qreate'); ?>" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" <?php
																																																										if (qreate()->is_amp()) {
																																																										?> on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )" [aria-expanded]="siteNavigationMenu.expanded ? 'true' : 'false'" <?php
																																																																																																	}
																																																																																																		?>>
			<?php esc_html_e('Menu', 'qreate'); ?>
			<span class="qreate-menu-box">
				<span class="hamburger one"></span>
				<span class="hamburger two"></span>
				<span class="hamburger three"></span>
			</span>
		</button>
	<?php } ?>
	<div id="navbarSupportedContent" class="collapse navbar-collapse new-collapse">
		<div id="qreate-menu-container" class="menu-all-pages-container">
			<?php
			if (qreate()->is_primary_nav_menu_active()) {
				qreate()->display_primary_nav_menu(array('menu_id' => 'top-menu', 'menu_class' => 'navbar-nav ml-auto'));
			}
			?>
		</div>
	</div>
	<?php if (class_exists('ReduxFramework') && isset($qreate_option['header_display_button']) && $qreate_option['header_display_button'] == 'yes') {
	?>
		<div class="qreate-shop-btn-holder">
			<ul>
				<li>
					<div class="search_count">
						<a href="#" id="btn-search"><i class="fa fa-search"></i></a>
						<div class="search">
							<button id="btn-search-close" class="btn btn--search-close" aria-label="Close search form">
								<i class="fa fa-times"></i>
							</button>
							<?php get_search_form(); ?>
						</div>
					</div>
				</li>
			</ul>
		</div>
	<?php } ?>

	<!-- shop page button start -->
	<!--mobile View-->
	<?php
	
	if (class_exists('WooCommerce') && isset($qreate_options['header_display_shop']) && $qreate_options['header_display_shop'] == 'yes') {
	?>
		<div class="woo-menu">
			<div id="shop-toggle">
				<div class="qreate-res-shop-btn-container qreate-btn-4" id='x-ver-res-btn'>
					<?php
					$shop_url = '';
					if (isset($qreate_options['shop_link']) && !empty($qreate_options['shop_link'])) {
						$shop_url = get_page_link($qreate_options['shop_link']);
					}
					?>
					<a href="<?php echo esc_url($shop_url); ?>">
						<span class="qreate-res-shop-btn">
							<i class="fa fa-shopping-basket" aria-hidden="true"></i>
						</span>
					</a>
				</div>
				<ul class="shop_list">
					<!-- wishlist -->
					<?php
					if (function_exists('YITH_WCWL') && isset($qreate_options['header_display_shop']) && $qreate_options['header_display_shop'] == 'yes') {
						$wish_url = '';
						if (isset($qreate_options['wishlist_link']) && !empty($qreate_options['wishlist_link'])) {
							$wish_url = get_page_link($qreate_options['wishlist_link']);
						}
					?>
						<li class="wishlist-btn">
							<div class="wishlist_count">
								<?php $wishlist_count = YITH_WCWL()->count_products(); ?>
								<a href="<?php echo esc_url($wish_url); ?>">
									<i class="fa fa-heart"></i>
									<span class="wcount"><?php echo esc_html($wishlist_count); ?></span>
								</a>
							</div>
						</li>
					<?php } ?>
					<!-- mini cart -->
					<?php
					if (isset($qreate_options['header_display_shop'])) {
						$options = $qreate_options['header_display_shop'];
						if ($options == "yes") { ?>
							<li class="cart-btn">
								<div class="cart_count">
									<a class="parents mini-cart-count" href="<?php echo wc_get_cart_url(); ?>">
										<i class="fa fa-shopping-cart"></i>
										<span id="mini-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
									</a>
								</div>
							</li>
					<?php
						}
					} ?>
				</ul>
			</div>
		</div>
	<?php } ?>

</nav><!-- #site-navigation -->