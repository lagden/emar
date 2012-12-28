<?php get_header(); ?>
	
	<?php if(show_sidebar_at('left')) { get_sidebar('left'); } ?>
	<section id="posts" class="single-post">
    
  		<?php if (have_posts()) : the_post(); ?>
			<!-- POST // begin -->
			<article id="post-<?php the_ID(); ?>" class="post">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<cite>
					<span class="date">Posted: <abbr title="<?php the_time('Y-d-m\TG:i:s') ?>" class="published"><?php the_time('jS F Y') ?></abbr></span>
					<span class="author">By <?php the_author() ?></span>
				</cite>
				<?php the_content('Continue reading &raquo;'); ?>

          		<nav>
            		<div class="previous"><?php previous_post_link('&laquo; %link'); ?></div>
            		<div class="next"><?php next_post_link('%link &raquo;') ?></div>
          		</nav>

				<footer class="post-info">
    				<small>Category: <?php the_category(', ') ?> | <?php the_tags( 'Tags: ', ', ', ''); ?>
    				<?php post_comments_feed_link('RSS (for these comments)'); ?> |  
						
    				<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) { ?>
      				<!-- Both Comments and Pings are open -->
      				<a href="#respond">Leave a comment</a> | <a href="<?php trackback_url(true); ?>" rel="trackback">Trackback</a>
						
    				<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { ?>
    				  <!-- Only Pings are Open -->
    				  Comments are closed. Feel free to <a href="<?php trackback_url(true); ?> " rel="trackback">Trackback</a> instead!
						
    				<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>
    				  <!-- Comments are open, Pings are not -->
    				  Trackbacks are currently disabled.
			
    				<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>
    					<!-- Neither Comments, nor Pings are open -->
              			Comments and Trackbacks are currently closed.			
						
    				<?php } edit_post_link('Moderate','| ',''); ?></small>
				  
    				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  				</footer>

				<section id="comments">
					<?php comments_template(); ?>
				</section>
				
			</article>
	
		<?php else : ?>

			<!-- NO POSTS  // woops -->
			<article id="no-posts" class="woops fail cliche about something bad happening etc">
				<h2>No Post(s) Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
			</article>

		<?php endif; ?>

	</section>
	<?php if(show_sidebar_at('right')) { get_sidebar ('right'); } ?>

<?php get_footer(); ?>
