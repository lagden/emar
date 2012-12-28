<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>
<div id="contentwrap">
	<div id="content">
    <h2>Links:</h2>
    <ul>
      <?php get_links_list(); ?>
    </ul>
	</div>
	<?php get_sidebar(); ?>
  <?php get_sidebar ('right'); ?>
</div>
<?php get_footer(); ?>