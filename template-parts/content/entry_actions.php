<?php
/**
 * Template part for displaying a post's comment and edit links
 *
 * @package qreate
 */

namespace qreate\qreate;

?>
<div class="entry-actions">
	<div class="blog-button">
	<a class="qreate-button" href="<?php the_permalink(); ?>">
		<span class="qreate-text"><?php esc_html_e('Read More', 'qreate'); ?><span class="qreate-strip"></span></span>
	</a>
	</div>
</div><!-- .entry-actions -->
