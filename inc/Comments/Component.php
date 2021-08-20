<?php

/**
 * qreate\qreate\Comments\Component class
 *
 * @package qreate
 */

namespace qreate\qreate\Comments;

use qreate\qreate\Component_Interface;
use qreate\qreate\Templating_Component_Interface;
use function qreate\qreate\qreate;
use function add_action;
use function is_singular;
use function comments_open;
use function get_option;
use function wp_enqueue_script;
use function the_ID;
use function wp_list_comments;
use function the_comments_navigation;
use function add_filter;
use function remove_filter;

/**
 * Class for managing comments UI.
 *
 * Exposes template tags:
 * * `qreate()->the_comments( array $args = array() )`
 *
 * @link https://wordpress.org/plugins/amp/
 */
class Component implements Component_Interface, Templating_Component_Interface
{

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug(): string
	{
		return 'comments';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize()
	{
		add_action('wp_enqueue_scripts', array($this, 'action_enqueue_comment_reply_script'));
		add_filter( 'comment_form_defaults',  array($this, 'filter_comment_form_defaults' ));
	}

	/**
	 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `qreate()`.
	 *
	 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
	 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
	 *               adding support for further arguments in the future.
	 */
	public function template_tags(): array
	{
		return array(
			'the_comments' => array($this, 'the_comments'),
		);
	}

	/**
	 * Enqueues the WordPress core 'comment-reply' script as necessary.
	 */
	public function action_enqueue_comment_reply_script()
	{

		// If the AMP plugin is active, return early.
		if (qreate()->is_amp()) {
			return;
		}

		// Enqueue comment script on singular post/page views only.
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}

	/**
	 * Filters the comment form default arguments.
	 *
	 * Change the heading level to h2 when there are no comments.
	 *
	 * @param array $args The default comment form arguments.
	 * @return array      Modified comment form arguments.
	 */
	public function filter_comment_form_defaults(array $args): array
	{
		if (get_comments_number()) {
			$args['title_reply_before'] = '<h4 id="reply-title" class="comment-reply-title">';
			$args['title_reply_after'] = '</h4>';
		}

		return $args;
	}

	/**
	 * Displays the list of comments for the current post.
	 *
	 * Internally this method calls `wp_list_comments()`. However, in addition to that it will render the wrapping
	 * element for the list, so that must not be added manually. The method will also take care of generating the
	 * necessary markup if amp-live-list should be used for comments.
	 *
	 * @param array $args Optional. Array of arguments. See `wp_list_comments()` documentation for a list of supported
	 *                    arguments.
	 */
	public function the_comments(array $args = array())
	{
		$args = array_merge(
			$args,
			array(
				'style' => 'ol',
				'short_ping' => true,
			)
		);

		$amp_live_list = qreate()->using_amp_live_list_comments();

		if ($amp_live_list) {
			$comment_order = get_option('comment_order');
			$comments_per_page = get_option('page_comments') ? (int)get_option('comments_per_page') : 10000;
			$poll_inverval = MINUTE_IN_SECONDS * 1000;

?>
			<amp-live-list id="amp-live-comments-list-<?php the_ID(); ?>" <?php echo ('asc' === $comment_order) ? ' sort="ascending" ' : ''; ?> data-poll-interval="<?php echo esc_attr($poll_inverval); ?>" data-max-items-per-page="<?php echo esc_attr($comments_per_page); ?>">
			<?php
		}

			?>
			<ol class="commentlist" <?php echo esc_html($amp_live_list) ? ' items' : ''; ?>>
				<?php wp_list_comments(array(
					'walker'      => new Component_Walker_Comment,
					'style'      => 'ol',
					'avatar_size' => 80,
				));
				?>
			</ol><!-- .comment-list -->
			<?php

			the_comments_navigation();

			if ($amp_live_list) {
			?>
				<div>
					<button class="button" on="tap:amp-live-comments-list-<?php the_ID(); ?>.update"><?php esc_html_e('New comment(s)', 'qreate'); ?></button>
				</div>
			</amp-live-list>
			<?php
			}
		}
		/**
		 * Adds a pagination reference point attribute for amp-live-list when theme supports AMP.
		 *
		 * This is used by the navigation_markup_template filter in the comments template.
		 *
		 * @link https://www.ampproject.org/docs/reference/components/amp-live-list#pagination
		 *
		 * @param string $markup Navigation markup.
		 * @return string Filtered markup.
		 */
		public function filter_add_amp_live_list_pagination_attribute(string $markup): string
		{
			return preg_replace('/(\s*<[a-z0-9_-]+)/i', '$1 pagination ', $markup, 1);
		}
	}
	if (!class_exists('WPSE_Walker_Comment')) {
		/**
		 * Custom comment walker
		 *
		 * @users Walker_Comment
		 */
		class Component_Walker_Comment extends \Walker_Comment
		{

			public function html5_comment($comment, $depth, $args)
			{
				$GLOBALS['comment'] = $comment;
				switch ($comment->comment_type):
					case 'pingback':
					case 'trackback':
						if (isset($args['style']) && 'div' == $args['style']) {
							$tag = 'div';
							$add_below = 'comment';
						} else {
							$tag = 'li';
							$add_below = 'div-comment';
						}
			?>
					<li <?php comment_class('qreate-comments-item'); ?> id="comment-<?php comment_ID(); ?>">
						<h4 class="mt-0 mb-0"><span class="qreate-type-date"><span class="mr-2"><?php echo esc_html__(comment_type() . ':', 'qreate'); ?></span><?php comment_author_link(); ?></span> <?php edit_comment_link(esc_html__('(Edit)', 'qreate'), '<span class="edit-link">', '</span>'); ?>
						</h4>
						<div class="qreate-comment-type-date">
							<a href="<?php echo esc_url(comment_link()); ?>">
								<time datetime="<?php comment_time('c'); ?>">
									<?php printf(wp_kses('%1$s', '1: date'), comment_date()); ?>
								</time>
							</a>
						</div>
				<?php
						break;
					default:
						global $post;
				?>
					<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
						<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
							<div class="qreate-comments-media">
								<div class="qreate-comment-wrap">
									<div class="qreate-comments-photo">
										<?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
									</div>
									<div class="qreate-comments-info">
									<h5 class="title">
											<?php printf(wp_kses('%s ', 'qreate'), sprintf('%s', get_comment_author_link())); ?>
										</h5>
										<?php edit_comment_link(esc_html__('Edit', 'qreate'), '<span class="edit-link">', '</span>'); ?>
										<!-- .comment-metadata -->	
										<div class="qreate-comment-metadata">
											<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
												<time datetime="<?php comment_time('c'); ?>">
													<?php printf(wp_kses('%1$s', '1: date'), get_comment_date()); ?>
												</time>
											</a>
										
										</div>
																			

										<?php if ('0' == $comment->comment_approved) : ?>
											<p class="comment-awaiting-moderation"><?php esc_html__('Your comment is awaiting moderation.', 'qreate'); ?></p>
										<?php endif; ?>
										<div class="comment-content">
											<?php comment_text(); ?>
										</div><!-- .comment-content -->
										<div class="reply qreate-reply qreate-button-style-2 has-icon btn-icon-right">
											<?php comment_reply_link(array_merge($args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
										</div>
										<!-- .reply -->
									</div><!-- .comment-author -->

								</div>
							</div>
						</article><!-- .comment-body -->
				
<?php
						break;
				endswitch;
			}
		}
		// end of WPSE_Walker_Comment
	}
?>