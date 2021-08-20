<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage qreate
 * @since 1.0
 * @version 1.0
 */
get_header(); 

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<?php
							the_content();
						?>
					</div>
				</div>
			</div><!-- #primary -->
		</main><!-- #main -->
	</div><!-- .container -->
<?php get_footer();
