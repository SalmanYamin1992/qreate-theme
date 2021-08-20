<?php

/**
 * Template part for displaying a post's footer
 *
 * @package qreate
 */

namespace qreate\qreate;

?>
<div class="blog-footer">
	<?php get_template_part('template-parts/content/entry_taxonomies', get_post_type()); ?>

	<?php
	$total_post = wp_count_posts(get_post_type());
	if (is_single() && $total_post->publish > 1) {
		echo '<div class="pagination-wrapper">';
		$prev_post = get_previous_post();
		if ($prev_post) {
			$prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
			echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title . '" class="n-post prev-post"><div class="circle-box left"><div class="sub-circle"><span class="text-btn-line-holder"><span class="text-btn-line-top"></span>                  
			<span class="text-btn-line"></span>
			<span class="text-btn-line-bottom"></span>
			</span>   
			</div>
			</div></a>' . "\n";
		}
		$next_post = get_next_post();
		if ($next_post) {
			$next_title = strip_tags(str_replace('"', '', $next_post->post_title));
			echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title . '" class="n-post next-post"><div class="circle-box right"><div class="sub-circle"><span class="text-btn-line-holder"><span class="text-btn-line-top"></span>                  <span class="text-btn-line"></span><span class="text-btn-line-bottom"></span></span>   </div></div></a>' . "\n";
		}
		echo '</div>';
	}
	?>
	<?php
	if (!is_single()) {
		get_template_part('template-parts/content/entry_actions', get_post_type());
	} ?>
</div><!-- .entry-footer -->