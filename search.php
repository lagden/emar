<?php get_header(); ?>
<div id="contentwrap">
	<div id="content">
	<?php if (have_posts()) : ?>
		<h2 class="archivetitle">Search Results</h2>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
		<?php while (have_posts()) : the_post(); ?>	
			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt() ?>
				<p class="postmetadata"><small><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?> | <?php edit_post_link('Edit','','|'); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></small></p>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
	<?php else : ?>
		<h2>Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>
	</div>
  <?php get_sidebar(); ?>
  <?php get_sidebar ('right'); ?>
</div>
<?php get_footer(); ?>