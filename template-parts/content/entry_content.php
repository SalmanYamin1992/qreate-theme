<?php
/**
 * Template part for displaying a post's content
 *
 * @package qreate
 */

namespace qreate\qreate;

?>

<div class="qreate-blog-detail">
	<?php
	if (is_single()) {
		the_content();
	} else {
		if($post->post_excerpt) {
			the_excerpt();
		} else {
			the_content( '', TRUE );
		}
	}
	?>
</div><!-- .entry-content -->
