<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qreate
 */

namespace qreate\qreate;

$footer_class = '';
$qreate_options = get_option('qreate-options');
if (isset($qreate_options['display_footer_bg_image'])) {
	$options = $qreate_options['display_footer_bg_image'];
	if ($options == "yes") {
		if (isset($qreate_options['footer_bg_image']['url'])) {
			$bgurl = $qreate_options['footer_bg_image']['url'];
		}
	}
}
?>

<footer id="colophon" class="footer" <?php if (!empty($bgurl)) { ?> style="background-image: url(<?php echo esc_url($bgurl); ?> ) !important;" <?php } ?>>
	<?php
	get_template_part('template-parts/footer/widget');
	get_template_part('template-parts/footer/info');
	?>
</footer><!-- #colophon -->
<!-- === back-to-top === -->
<div id="back-to-top">
	<a class="top" id="top" href="#top">
		<div class="circle-box">
			<div class="sub-circle">
				<span class="text-btn-line-holder">
					<span class="text-btn-line-top"></span>
					<span class="text-btn-line"></span>
					<span class="text-btn-line-bottom"></span>
				</span>
			</div>
		</div>
		<span class="top-text"><?php _e('top', 'qreate'); ?></span>
	</a>
</div>
<!-- === back-to-top End === -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>

</html>