<?php

/**
 * Template part for displaying a post's taxonomy terms
 *
 * @package qreate
 */

namespace qreate\qreate;

$taxonomies = wp_list_filter(
	get_object_taxonomies($post, 'objects'),
	array(
		'public' => true,
	)
);

?>
<?php
$post_tag = get_the_tags();
if ($post_tag) { ?>
	<ul class="qreate-blogtag">
		<?php foreach ($post_tag as $cat) { ?>
			<li><a href="<?php echo get_term_link($cat) ?>"><?php echo '#' . esc_html($cat->name); ?></a></li>
		<?php } ?>
	</ul>

<?php }
?>