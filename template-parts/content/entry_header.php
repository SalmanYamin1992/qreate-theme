<?php

/**
 * Template part for displaying a post's header
 *
 * @package qreate
 */

namespace qreate\qreate;

$qreate_options = get_option('qreate-options');
?>

<div class="qreate-blog-head">
	<?php
	get_template_part('template-parts/content/entry_title', get_post_type());
	$post_type_obj = get_post_type_object(get_post_type());
	if (post_type_supports($post_type_obj->name, 'author')) {
		$author_string = sprintf(
			'<span class="author vcard blog-author"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url(get_author_posts_url(get_the_author_meta('ID'))),
			__('By ', 'qreate') . esc_html(get_the_author())
		);
		if (!empty($author_string)) {
			printf($author_string);
		}
	}
	if (class_exists('ReduxFramework')) {
		$options = isset($qreate_options['display_featured_image']) ? $qreate_options['display_featured_image'] : 'no';
		if ($options == "yes") {
			get_template_part('template-parts/content/entry_thumbnail', get_post_type());
		}
	} else {
		get_template_part('template-parts/content/entry_thumbnail', get_post_type());
	}
	get_template_part('template-parts/content/entry_meta', get_post_type());
	?>
</div><!-- .entry-header -->