<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qreate
 */

namespace qreate\qreate;

$qreate_options = get_option('qreate-options');
$post_section = qreate()->post_style();
get_header();
?>
<div class="site-content-contain">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class="container">
					<div class="row pro-cat-block">
						<?php
						while (have_posts()) : the_post();
							$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'qreate-project-2');
						?>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="project-item qreate-blog-box">
									<div class="qreate-project-image">
										<img src="<?php echo esc_url($full_image[0]); ?>" alt="<?php esc_attr_e('image','qreate'); ?>" />
									</div>
									<div class="qreate_content">
										<a href="<?php the_permalink(); ?>">
											<h5 class="qreate-port-name">
												<?php the_title(); ?>
											</h5>
										</a>
										<div class="qreate-title-desc">
											<?php
											the_excerpt();
											?>
										</div>
									</div>
									<?php get_template_part('template-parts/content/entry_actions', get_post_type()); ?>
								</div>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</main>
		</div>
	</div>
</div>
<?php
get_footer();
