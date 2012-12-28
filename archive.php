<?php get_header(); ?>
<div id="contentwrap">
  
	<?php if(show_sidebar_at('left')) { get_sidebar('left'); } ?>
	<section id="posts" class="archives">

		<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			
			<?php /* If this is a category archive */ if (is_category()) { ?>				
  			<h2 class="archivetitle"><?php echo single_cat_title(); ?> Category Archive</h2>
  			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
  			<h2 class="archivetitle"><?php the_time('F jS, Y'); ?> Archive</h2>
  			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
  			<h2 class="archivetitle"><?php the_time('F, Y'); ?> Archive </h2>
  			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
  			<h2 class="archivetitle"><?php the_time('Y'); ?> Archive </h2>
  			<?php /* If this is a search */ } elseif (is_search()) { ?>
  			<h2 class="archivetitle">Search Results</h2>
  			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
  			<h2 class="archivetitle">Author Archive</h2>
  			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
  			<h2 class="archivetitle">Blog Archive</h2>
		  <?php } ?>

      <!-- POSTS // START -->
  		<?php while (have_posts()) : the_post(); ?>
    		<div class="post">
    			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    			<?php the_excerpt() ?>
    			<p class="postmetadata"><small><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?> | <?php edit_post_link('Edit','','|'); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></small></p> 
    		</div>
        <!-- POSTS // END -->
  		<?php endwhile; ?>
			<nav>
				<div class="previous"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="next"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			</nav>
      <!-- POSTS // end -->
		<?php else : ?>
			<!-- NO POSTS  // woops -->
			<article>
				<h2>No Post(s) Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
			</article>
		<?php endif; ?>

	</section>
	<?php if(show_sidebar_at('right')) { get_sidebar ('right'); } ?>

</div>
<?php get_footer(); ?>
