<?php

/**
 * Template part for displaying a post's metadata
 *
 * @package qreate
 */

namespace qreate\qreate;

$post_type_obj = get_post_type_object(get_post_type());

$time_string = '';
if (isset($post_type_obj)) {
	// Show date only when the post type is 'post' or has an archive.
	if ('post' === $post_type_obj->name || $post_type_obj->has_archive) {
		$time_string = '
	<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date('c')),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date('c')),
			esc_html(get_the_modified_date())
		);

		$time_string = '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>';
	}
}

$parent_string = '';

// Show parent post only if available and if the post type is 'attachment'.
if (!empty($post->post_parent) && 'attachment' === get_post_type()) {
	$parent_string = sprintf(
		'<a href="%1$s">%2$s</a>',
		esc_url(get_permalink($post->post_parent)),
		esc_html(get_the_title($post->post_parent))
	);
}

?>
<div class="qreate-blog-meta">
	<ul class="list-inline">

		<?php
		$postcat = get_the_category();
		if ($postcat) {
			foreach ($postcat as $cat) { ?>
				<li><a href="<?php echo get_category_link($cat->cat_ID) ?>"><?php echo esc_html($cat->name); ?></a></li>
		<?php }
		}
		?>
		<?php
		if (!empty($time_string)) { ?>
			<li class="posted-on">
				<?php printf($time_string); ?>
			</li>
		<?php }

		if (!empty($parent_string)) { ?>
			<li class="posted-in">
				<?php
				/* translators: %s: post parent title */
				$parent_note = _x('In %s', 'post parent', 'qreate');
				if (!empty($time_string) || !empty($author_string)) {
					/* translators: %s: post parent title */
					$parent_note = _x('in %s', 'post parent', 'qreate');
				}
				printf(
					esc_html($parent_note),
					$parent_string // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
				?>
			</li>
		<?php } ?>
	</ul>

</div><!-- .entry-meta -->
<?php
