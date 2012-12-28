<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password))
	{ // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) 
		{ ?>
			<h3 class="nocomments sorry nothing to see here">This post is password protected. Enter the password to view comments.</h3>
			<?php
			return;
    	}
 	}
?>

<?php if ($comments) : ?>
	<section id="the-comments">
		<header>
			<h3><?php comments_number('No Responses', '1 Response', '% Responses' );?> to <em><?php the_title(); ?></em></h3>
		</header>

		<?php foreach ($comments as $comment) : ?>
			<article id="comment-<?php comment_ID() ?>">
				<header>  
					<cite><?php comment_author_link() ?></cite> on <time datetime="<?php comment_date('Y-m-d\TH:i:sP') ?>"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></time>  
				</header>
				<?php if ($comment->comment_approved == '0') : ?><p><em>Your comment is awaiting moderation.</em></p><?php endif; ?>
				<?php comment_text() ?>
				<footer>
					<?php edit_comment_link('Moderate','',''); ?></small>
				</footer>
			</article>
		<?php endforeach; /* end for each comment */ ?>
	</section>
<?php else : // this is displayed if there are no comments so far ?>
	<section id="no-comments">
		<?php if ('open' == $post->comment_status) : ?> 
			<!-- If comments are open, but there are no comments. -->
		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<h3>Comments are closed.</h3>	
		<?php endif; ?>
	</section>
<?php endif; ?>

<section id="comment-form">
	<?php if ('open' == $post->comment_status) : ?>
		<header>
			<h3 id="respond">Post a Comment</h3>
		</header>
		
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
				<?php if ( $user_ID ) : ?>
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
				<?php else : ?>
					<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" 			size="22" tabindex="1" /><label for="author"><small>Name <?php if ($req) echo "(*)"; ?></small></label></p>
					<p><input type="text" name="email" 	id="email" 	value="<?php echo $comment_author_email; ?>" 	size="22" tabindex="2" /><label for="email"><small>Email <?php if ($req) echo "(*)"; ?> (private)</small></label></p>
					<p><input type="text" name="url" 	id="url" 	value="<?php echo $comment_author_url; ?>" 		size="22" tabindex="3" /><label for="url"><small>Website</small></label></p>
				<?php endif; ?>
				<p><textarea name="comment" id="commentbox" cols="100%" rows="10" tabindex="4"></textarea></p>
				<p>
					<input name="submit" type="submit" id="submit" tabindex="5" value="Submit" /> 
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				</p>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
		<?php endif; // if registration required and not logged in ?>
	<?php endif; // if you delete this the sky will fall on your head ?>
</section><!-- end // #comment-form -->