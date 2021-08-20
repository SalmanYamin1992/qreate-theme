<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qreate
 */

namespace qreate\qreate;

$post_section = qreate()->post_style();
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}

qreate()->print_styles('qreate-comments');

?>
<div id="comments" class="comments-area">
	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) {
	?>
		<h4 class="comments-title">
		<span class="position-relative d-inline-block">
			<?php
			$comments_number = get_comments_number();

			if ($comments_number == 1) {
				_e(' Comment', 'qreate');
			} else {
				_e(' Comments', 'qreate');
			}
			echo '(' . esc_html($comments_number) . ')';
			?>
			<span class="line wow"></span>
			</span>
			
		</h4>
		<?php the_comments_navigation(); ?>

		<?php qreate()->the_comments(); ?>

		<?php
		if (!comments_open()) {
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'qreate'); ?></p>
	<?php
		}
	}
	$args = array(
		'label_submit' => esc_html__('Post Comment', 'qreate'),
		'comment_notes_before' => esc_html__('Your email address will not be published. Required fields are marked *', 'qreate') . '',
		'comment_field' => '<div class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="Comment" rows="5"></textarea></div>',
		'fields' => array(
			'author' => '<div class="row"><div class="col-lg-4"><div class="comment-form-author"><input id="author" name="author" aria-required="true" placeholder="Name*" /></div></div>',
			'email' => '<div class="col-lg-4"><div class="comment-form-email"><input id="email" name="email" placeholder="Email*" /></div></div>',
			'url' => '<div class="col-lg-4"><div class="comment-form-url"><input id="url" name="url" placeholder="Website" /></div></div></div>',
		),
		'submit_button'	=> '
					<button name="%1$s" type="submit" id="%2$s" class="%3$s qreate-button" value="%4$s" >
					<span class="qreate-text">' . esc_html__('Post Comment', 'qreate') . '<span class="qreate-strip"></span></span>
					</button>',
	);

	comment_form($args);
	?>
</div><!-- #comments -->