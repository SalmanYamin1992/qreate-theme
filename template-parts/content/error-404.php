<?php

/**
 * Template part for displaying the page content when a 404 error has occurred
 *
 * @package qreate
 */

namespace qreate\qreate;

$qreate_options = get_option('qreate-options');
?>
<div>
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main pt-0">
				<div class="error-404 not-found">
					<div class="page-content">
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="routed-text text-effect">

									<div class="main-shap-box">
										<div class="shap-one"></div>
										<div class="shap-two"></div>

										<?php
										if (!empty($qreate_options['404_banner_image']['url'])) { ?>
											<div class="fourzero-image mb-5">
												<img src="<?php echo esc_url($qreate_options['404_banner_image']['url']); ?>" alt="<?php esc_attr_e('404', 'qreate'); ?>" />
											</div>
										<?php } else {
											$bgurl = get_template_directory_uri() . '/assets/images/redux/404.png';
										?>
											<div class="fourzero-image mb-5">
												<img src="<?php echo esc_url($bgurl); ?>" alt="<?php esc_attr_e('404', 'qreate'); ?>" />
											</div>

										<?php } ?>
									</div>
								</div>
								<?php

								if (!empty($qreate_options['404_title'])) { ?>
									<h4> <?php
											$four_title = $qreate_options['404_title'];
											echo esc_html($four_title); ?>
									</h4> <?php
										} else { ?>
									<h4><?php esc_html_e('Oops! This Page is Not Found.', 'qreate'); ?></h4>
								<?php }

										if (!empty($qreate_options['404_description'])) { ?>
									<p class="mb-5">
										<?php $four_des = $qreate_options['404_description'];
											echo esc_html($four_des); ?>
									</p> <?php
										} else { ?>
									<p class="mb-5">
										<?php esc_html_e('The requested page does not exist.', 'qreate'); ?>
									</p>
								<?php } ?>

								<div class="d-block">
									<a class="qreate-button" href="<?php echo esc_url(home_url()); ?>">
										<span class="qreate-text">
											<?php esc_html_e('Back to Home', 'qreate'); ?>
											<span class="qreate-strip"></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div><!-- .page-content -->
				</div><!-- .error-404 -->
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
</div>