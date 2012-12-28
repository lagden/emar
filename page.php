<?php get_header(); ?>
<div id="contentwrap">
	<div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  		<div class="post" id="post-<?php the_ID(); ?>">
  			<?php the_content(); ?>
  			</div>
	  	<?php endwhile; endif; ?>
		<?php edit_post_link('Edit', '<p>', '</p>'); ?>
  </div>
</div>
<?php get_footer(); ?>