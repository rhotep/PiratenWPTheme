<?php
/**
 * @package WordPress
 * @subpackage Piraten_Berlin_Theme
 */

if ( post_password_required() ) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>



<fieldset class="comments">
	<legend class="comments"><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?>
	<?php if ( comments_open() ) : ?>
		<!-- <a href="#postcomment" title="<?php _e("Leave a comment"); ?>">	&darr;</a> -->
	<?php endif; ?>
	</legend>

	<?php if ( have_comments() ) : ?>
	<ul id="commentlist">
	
	<?php foreach ($comments as $comment) : ?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<div class="clear">&nbsp;</div>
			<div class="user_info">
				<?php echo get_avatar( $comment, 32 ); ?>
				<div class="author">
					<?php comment_type(_x('Comment', 'noun'), __('Trackback'), __('Pingback')); ?> <?php _e('by'); ?><br /> 
					<?php comment_author_link() ?> 
				</div>
				<div class="clear">&nbsp;</div>

				<?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a><br />
				<?php edit_comment_link(__("Edit This")); ?>
			</div>		
			<div class="text">
						<?php comment_text() ?>
			</div>		
			<div class="clear">&nbsp;</div>
		</li>

	<?php endforeach; ?>

	</ul>

	<?php else : // If there are no comments yet ?>
		<p><?php _e('No comments yet.'); ?></p>
	<?php endif; ?>
	
	<p><?php post_comments_feed_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post.')); ?>
	<?php if ( pings_open() ) : ?>
		<a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack <abbr title="Universal Resource Locator">URL</abbr>'); ?></a>
	<?php endif; ?>
	</p>
</fieldset>



<?php if ( comments_open() ) : ?>
<h2 id="postcomment"><?php _e('Leave a comment'); ?></h2>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() ) );?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (will not be published)');?> <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
<?php endif; ?>
