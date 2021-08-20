<?php

/**
 * Template part for displaying the header navigation menu
 *
 * @package qreate
 */

namespace qreate\qreate;

$qreate_options = get_option('qreate-options');
$has_sticky = '';
if (isset($qreate_options['display_sticky_header']) && $qreate_options['display_sticky_header'] == 'yes') {
	$has_sticky .= ' has-sticky';
}
?>
<header id="main-header" class="site-header <?php echo esc_attr($has_sticky); ?> header-style-2 d-flex">



	<?php if (class_exists('ReduxFramework') && isset($qreate_options['header_display_button']) && $qreate_options['header_display_button'] == 'yes') {
	?>
		<div class="qreate-search-holder">
			<div class="search_count">
				<a href="javascript:void(0);" id="btn-search"><i class="fa fa-search"></i>
				</a>
				<div class="search">
					<button id="btn-search-close" class="btn btn--search-close" aria-label="Close search form">
						<i class="fa fa-times"></i>
					</button>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	<?php } ?>

	<div class="qreate-header-wrapper">



		<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
			<?php
			if (function_exists('get_field') && class_exists('ReduxFramework')) {
				$qreate_options = get_option('qreate-options');
				$key = get_field('key_header');
				if (!empty($key['header_logo']['url'])) {
					$options = $key['header_logo']['url'];
			?>
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
		<div class="right-main d-flex align-items-center">
			<!--mobile View-->
			<?php
			if (class_exists('ReduxFramework') && isset($qreate_options['qreate_header_social_media']) && $qreate_options['qreate_header_social_media'] == 'yes') {
			?>
				<div class="social-icone">
					<?php $data = $qreate_options['social_media_options']; ?>
					<ul class="list-inline mb-0">
						<?php
						$text_array = [
							'facebook'     		=> [__('fb', 'qreate')],
							'twitter'      		=> [__('tw', 'qreate')],
							'google-plus'  		=> [__('g+', 'qreate')],
							'github'      	 	=> [__('gh', 'qreate')],
							'instagram'      	=> [__('in', 'qreate')],
							'linkedin'       	=> [__('ln', 'qreate')],
							'tumblr'         	=> [__('tl', 'qreate')],
							'pinterest'      	=> [__('pt', 'qreate')],
							'dribbble'       	=> [__('db', 'qreate')],
							'reddit'         	=> [__('rd', 'qreate')],
							'flickr'         	=> [__('fc', 'qreate')],
							'skype'          	=> [__('sp', 'qreate')],
							'youtube'   		=> [__('yt', 'qreate')],
							'vimeo'          	=> [__('vm', 'qreate')],
							'soundcloud'     	=> [__('sc', 'qreate')],
							'wechat'         	=> [__('wc', 'qreate')],
							'renren'         	=> [__('rr', 'qreate')],
							'weibo'          	=> [__('wb', 'qreate')],
							'xing'           	=> [__('xi', 'qreate')],
							'qq'             	=> [__('qq', 'qreate')],
							'rss'            	=> [__('rs', 'qreate')],
							'vk'             	=> [__('vk', 'qreate')],
							'behance'        	=> [__('bh', 'qreate')],
							'snapchat'       	=> [__('sp', 'qreate')],
						];

						foreach ($data as $key => $options) {
							if ($options) {
								echo '<li class="d-inline"><a href="' . esc_url($options) . '">' . $text_array[$key][0] . '</a></li>';
							}
						} ?>
					</ul>
				</div>
			<?php
			}
			?>

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
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" style="&#10; ">
										<rect width="30" height="30" fill="" />
										<path fill-rule="evenodd" clip-rule="evenodd" d="M7.90963 10.4343L8.66338 19.3993C8.71841 20.0893 9.28213 20.6068 9.97091 20.6068H9.97588H23.6146H23.6172C24.2684 20.6068 24.8247 20.1218 24.9171 19.478L26.1046 11.2793C26.1321 11.0843 26.0834 10.8893 25.9647 10.7318C25.8471 10.573 25.6746 10.4705 25.4796 10.443C25.2184 10.453 14.3772 10.438 7.90963 10.4343ZM9.96838 22.4818C8.32213 22.4818 6.92835 21.1967 6.79461 19.553L5.6496 5.9355L3.76586 5.61052C3.25461 5.52052 2.91336 5.03677 3.00086 4.5255C3.09086 4.01425 3.58461 3.68175 4.08461 3.76174L6.6846 4.21174C7.10338 4.2855 7.42213 4.63299 7.45836 5.058L7.75213 8.55924C25.5971 8.56674 25.6546 8.5755 25.7409 8.58549C26.4371 8.68674 27.0496 9.05049 27.4671 9.6105C27.8846 10.1693 28.0596 10.858 27.9596 11.548L26.7733 19.7455C26.5496 21.3055 25.1946 22.4818 23.6196 22.4818H23.6134H9.97836H9.96838Z" fill="white" />
										<path fill-rule="evenodd" clip-rule="evenodd" d="M21.6095 15.0547H18.1445C17.6257 15.0547 17.207 14.6347 17.207 14.1172C17.207 13.5997 17.6257 13.1797 18.1445 13.1797H21.6095C22.127 13.1797 22.547 13.5997 22.547 14.1172C22.547 14.6347 22.127 15.0547 21.6095 15.0547Z" fill="white" />
										<path fill-rule="evenodd" clip-rule="evenodd" d="M9.43056 25.8774C9.80683 25.8774 10.1106 26.1811 10.1106 26.5574C10.1106 26.9336 9.80683 27.2386 9.43056 27.2386C9.05308 27.2386 8.74933 26.9336 8.74933 26.5574C8.74933 26.1811 9.05308 25.8774 9.43056 25.8774Z" fill="white" />
										<mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="8" y="25" width="3" height="3">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.74878 26.5568C8.74878 26.9343 9.05253 27.2393 9.43128 27.2393C9.8075 27.2393 10.1112 26.9343 10.1112 26.5568C10.1112 26.1806 9.8075 25.8768 9.43128 25.8768C9.05253 25.8768 8.74878 26.1806 8.74878 26.5568Z" fill="white" />
										</mask>
										<g mask="url(#mask0)">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 33.4881H16.3612V19.6268H2.5V33.4881Z" fill="white" />
										</g>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M9.42934 26.301C9.28811 26.301 9.17313 26.416 9.17313 26.5573C9.17313 26.841 9.68688 26.841 9.68688 26.5573C9.68688 26.416 9.57063 26.301 9.42934 26.301ZM9.4293 28.176C8.5368 28.176 7.81183 27.4498 7.81183 26.5573C7.81183 25.6648 8.5368 24.9398 9.4293 24.9398C10.3218 24.9398 11.0481 25.6648 11.0481 26.5573C11.0481 27.4498 10.3218 28.176 9.4293 28.176Z" fill="white" />
										<path fill-rule="evenodd" clip-rule="evenodd" d="M23.531 25.8774C23.9072 25.8774 24.2122 26.1811 24.2122 26.5574C24.2122 26.9336 23.9072 27.2386 23.531 27.2386C23.1535 27.2386 22.8497 26.9336 22.8497 26.5574C22.8497 26.1811 23.1535 25.8774 23.531 25.8774Z" fill="white" />
										<mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="22" y="25" width="3" height="3">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.85 26.5568C22.85 26.9343 23.1537 27.2393 23.5312 27.2393C23.9062 27.2393 24.2125 26.9343 24.2125 26.5568C24.2125 26.1806 23.9062 25.8768 23.5312 25.8768C23.1537 25.8768 22.85 26.1806 22.85 26.5568Z" fill="white" />
										</mask>
										<g mask="url(#mask1)">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M16.5999 33.4881H30.4624V19.6268H16.5999V33.4881Z" fill="white" />
										</g>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M23.5297 26.301C23.3898 26.301 23.2747 26.416 23.2747 26.5573C23.276 26.8435 23.7885 26.841 23.7873 26.5573C23.7873 26.416 23.671 26.301 23.5297 26.301ZM23.5297 28.176C22.6372 28.176 21.9122 27.4498 21.9122 26.5573C21.9122 25.6648 22.6372 24.9398 23.5297 24.9398C24.4235 24.9398 25.1497 25.6648 25.1497 26.5573C25.1497 27.4498 24.4235 28.176 23.5297 28.176Z" fill="white" />
									</svg>
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
											<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 30 30" fill="none">
												<mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="2" y="3" width="27" height="26">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M2.49997 3.74989H28.0906V28.1261H2.49997V3.74989Z" fill="white" />
												</mask>
												<g>
													<path fill-rule="evenodd" clip-rule="evenodd" d="M4.77918 15.1538C6.53165 20.6063 13.4554 25.0151 15.2954 26.1063C17.1417 25.0038 24.1154 20.5463 25.8117 15.1588C26.9254 11.6763 25.8917 7.26506 21.7842 5.94131C19.7942 5.30259 17.4729 5.69132 15.8704 6.93131C15.5354 7.18884 15.0704 7.19381 14.7329 6.93881C13.0354 5.66259 10.8179 5.28881 8.79665 5.94131C4.69541 7.26384 3.66541 11.6751 4.77918 15.1538ZM15.2967 28.1263C15.1417 28.1263 14.9879 28.0888 14.8479 28.0125C14.4567 27.7988 5.24043 22.7188 2.99418 15.7263C2.99293 15.7263 2.99293 15.725 2.99293 15.725C1.58293 11.3225 3.15293 5.79004 8.22168 4.15628C10.6017 3.38628 13.1954 3.72503 15.2929 5.04876C17.3254 3.76377 20.0254 3.40878 22.3579 4.15628C27.4317 5.79252 29.0067 11.3238 27.5979 15.725C25.4242 22.6375 16.1404 27.7938 15.7467 28.01C15.6067 28.0875 15.4517 28.1263 15.2967 28.1263Z" fill="white" />
												</g>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M22.6921 13.2811C22.2084 13.2811 21.7983 12.9099 21.7584 12.4199C21.6759 11.3924 20.9883 10.5249 20.0096 10.2087C19.5159 10.0486 19.2459 9.51989 19.4046 9.02864C19.5659 8.53617 20.0896 8.26866 20.5846 8.42367C22.2884 8.97492 23.4821 10.4836 23.6283 12.2674C23.6696 12.7837 23.2859 13.2361 22.7696 13.2774C22.7433 13.2799 22.7184 13.2811 22.6921 13.2811Z" fill="white" />
											</svg>

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
												<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 30 30" fill="none">
													<mask id="mask20" mask-type="alpha" maskUnits="userSpaceOnUse" x="2" y="8" width="25" height="21">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M2.49994 8.17505H26.9823V28.402H2.49994V8.17505Z" />
													</mask>
													<g>
														<path fill-rule="evenodd" clip-rule="evenodd" d="M8.39435 10.05C7.8431 10.05 6.00059 10.2725 5.47184 13.1275L4.50686 20.6275C4.19311 22.7313 4.43561 24.2538 5.22935 25.175C6.0131 26.0851 7.4156 26.5276 9.5156 26.5276H19.9506C21.2606 26.5276 23.0494 26.2663 24.1294 25.0188C24.9868 24.0301 25.2819 22.5575 25.0069 20.6413L24.0331 13.0763C23.6181 11.2125 22.5231 10.05 21.1181 10.05H8.39435ZM19.9506 28.4026H9.5156C6.83683 28.4026 4.9706 27.7463 3.80935 26.3975C2.6431 25.045 2.2531 23.0163 2.6506 20.3688L3.6206 12.8363C4.2581 9.38255 6.58934 8.17505 8.39435 8.17505H21.1181C22.9306 8.17505 25.1344 9.3788 25.8781 12.755L26.8644 20.3888C27.2181 22.8526 26.7756 24.8288 25.5469 26.2463C24.3244 27.6563 22.3893 28.4026 19.9506 28.4026Z" fill="white" />
													</g>
													<path fill-rule="evenodd" clip-rule="evenodd" d="M20.1221 9.77531C19.6046 9.77531 19.1846 9.35531 19.1846 8.83781C19.1846 6.37655 17.1821 4.3753 14.7221 4.3753H14.7034C13.5271 4.3753 12.3809 4.84908 11.5496 5.6753C10.7146 6.50658 10.2359 7.66031 10.2359 8.83781C10.2359 9.35531 9.8159 9.77531 9.2984 9.77531C8.7809 9.77531 8.3609 9.35531 8.3609 8.83781C8.3609 7.16405 9.04087 5.52783 10.2259 4.34656C11.4071 3.17281 13.0359 2.50031 14.6996 2.50031H14.7259C18.2171 2.50031 21.0596 5.34281 21.0596 8.83781C21.0596 9.35531 20.6396 9.77531 20.1221 9.77531Z" fill="white" />
													<path fill-rule="evenodd" clip-rule="evenodd" d="M18.429 15.4051H18.3715C17.854 15.4051 17.434 14.9851 17.434 14.4676C17.434 13.9501 17.854 13.5301 18.3715 13.5301C18.889 13.5301 19.3378 13.9501 19.3378 14.4676C19.3378 14.9851 18.9465 15.4051 18.429 15.4051Z" fill="white" />
													<path fill-rule="evenodd" clip-rule="evenodd" d="M11.1402 15.4051H11.0839C10.5664 15.4051 10.1464 14.9851 10.1464 14.4676C10.1464 13.9501 10.5664 13.5301 11.0839 13.5301C11.6014 13.5301 12.0502 13.9501 12.0502 14.4676C12.0502 14.9851 11.6577 15.4051 11.1402 15.4051Z" fill="white" />
												</svg>
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
			<nav id="site-navigation" class="navbar mobile-navbar navbar-expand-xl navbar-light p-0" aria-label="<?php esc_html_e('Main menu', 'qreate'); ?>" <?php if (qreate()->is_amp()) { ?> [class]=" siteNavigationMenu.expanded ? 'main-navigation nav--toggle-sub nav--toggle-small nav--toggled-on' : 'main-navigation nav--toggle-sub nav--toggle-small' " <?php } ?>>

				<button type="button" class="navbar-toggler verticle-toggle" data-toggle="collapse" aria-label="<?php esc_html_e('Open menu', 'qreate'); ?>" data-target="#navbarSupportedMobile" aria-controls="navbarSupportedMobile" aria-expanded="false" <?php if (qreate()->is_amp()) { ?> on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )" [aria-expanded]="siteNavigationMenu.expanded ? 'true' : 'false'" <?php
																																																																																																															}
																																																																																																																?>>

					<span class="qreate-menu-box">
						<span class="hamburger one"></span>
						<span class="hamburger two"></span>
						<span class="hamburger three"></span>
					</span>
				</button>

				<div id="navbarSupportedMobile" class="collapse navbar-collapse new-collapse">
					<div id="qreate-menu-container" class="menu-all-pages-container">
						<?php
						if (qreate()->is_primary_nav_menu_active()) {
							qreate()->display_primary_nav_menu(array('menu_id' => 'top-menu', 'menu_class' => 'navbar-nav ml-auto'));
						}
						?>
					</div>
				</div>
			</nav><!-- #site-navigation -->
			<!--mobile View-->

		</div>
	</div>

</header><!-- #masthead -->
<div class="header-verticle">
	<nav class="navbar navbar-expand-xl navbar-light p-0" aria-label="<?php esc_html_e('Main menu', 'qreate'); ?>" <?php if (qreate()->is_amp()) { ?> [class]=" siteNavigationMenu.expanded ? 'main-navigation nav--toggle-sub nav--toggle-small nav--toggled-on' : 'main-navigation nav--toggle-sub nav--toggle-small' " <?php }
																																																																															?>>



		<div id="navbarSupportedContent" class="collapse navbar-collapse new-collapse">
			<div class="menu-all-pages-container">
				<?php
				if (qreate()->is_primary_nav_menu_active()) {
					qreate()->display_primary_nav_menu(array('menu_id' => 'top-menu-vertical', 'menu_class' => 'sf-menu sf-vertical navbar-nav ml-auto'));
				}
				?>
			</div>
		</div>
		<!-- shop page button start -->
	</nav><!-- #site-navigation -->
</div>