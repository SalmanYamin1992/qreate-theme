<?php

/**
 * Template part for displaying a post's page
 *
 * @package qreate
 */

namespace qreate\qreate;

?>

	<?php
	the_content();
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'qreate' ),
		'after'  => '</div>',
	) );
	// Show comments only when the post type supports it and when comments are open or at least one comment exists.
	if (post_type_supports(get_post_type(), 'comments') && (comments_open() || get_comments_number())) {
		comments_template();
	}
	?>
