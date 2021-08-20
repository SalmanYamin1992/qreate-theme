<?php

/**
 * Template part for displaying the footer info
 *
 * @package qreate
 */

namespace qreate\qreate;

$qreate_options = get_option('qreate-options');

?>

<div class="copyright-footer">
	<div class="container">
		<div class="row">
			<?php if($qreate_options['display_footer_logo'] == 'yes' && isset($qreate_options['display_footer_logo'])) { ?>
			<div class="col-md-6 m-0">
				<div class="footer-logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<?php
						if (function_exists('get_field') && get_field('acf_key_footer_switch') != 'default') {
							$key = get_field('footer_logo');

							$key = get_field('field_footer_logo');
							if (!empty($key['field_footer_logo']['url'])) {
								$options = $key['field_footer_logo']['url'];
						?>
								<img class="img-fluid" src="<?php echo esc_url($options); ?>" alt="<?php echo esc_attr('footer-logo'); ?>">
							<?php
							} else { ?>
								<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php echo esc_attr('footer-logo'); ?>">

							<?php }
						} else if (isset($qreate_options['logo_footer']['url']) && !empty($qreate_options['logo_footer']['url'])) {
							$footer_logo = $qreate_options['logo_footer']['url'];  ?>
							<img class="img-fluid" src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr('footer-logo'); ?>">
						<?php
						} else { ?>
							<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php echo esc_attr('footer-logo'); ?>">

						<?php } ?>
					</a>
				</div>
			</div>
			<?php } ?>
			<div class="<?php if($qreate_options['display_footer_logo'] == 'yes' && isset($qreate_options['display_footer_logo'])) { echo esc_attr('col-md-6'); } else { echo esc_attr('col-12'); } ?> m-0">
				<?php if (class_exists('ReduxFramework') && $qreate_options['display_copyright'] == 'yes') {  ?>
					<div class="pt-3 pb-3 footer-copyright-text text-<?php echo esc_attr($qreate_options['footer_copyright_align']); ?>">
						<?php
						if (isset($qreate_options['footer_copyright'])) {  ?>
							<span class="copyright"><?php echo html_entity_decode($qreate_options['footer_copyright']); ?></span>
						<?php
						} else {	?>
							<span class="copyright"><a target="_blank" href="<?php echo esc_url(__('https://themeforest.net/user/iqonicthemes/portfolio/', 'qreate')); ?>"> <?php printf(esc_html__('© 2021', 'qreate'), 'qreate'); ?><strong><?php printf(esc_html__(' qreate ', 'qreate'), 'qreate'); ?></strong><?php printf(esc_html__('. All Rights Reserved.', 'qreate'), 'qreate'); ?></a></span>
						<?php
						} ?>
					</div>
				<?php } if(!class_exists('ReduxFramework')) { ?>
					<div class="pt-3 pb-3 footer-copyright-text">
						<span class="copyright"><a target="_blank" href="<?php echo esc_url(__('https://themeforest.net/user/iqonicthemes/portfolio/', 'qreate')); ?>"> <?php printf(esc_html__('© 2021', 'qreate'), 'qreate'); ?><strong><?php printf(esc_html__(' qreate ', 'qreate'), 'qreate'); ?></strong><?php printf(esc_html__('. All Rights Reserved.', 'qreate'), 'qreate'); ?></a></span>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div><!-- .site-info -->

<?php
