<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<div id="contentwrap">
	
	<div id="content">

			<h2 class="archivetitle">Listing by Post</h2>
			  <ul class="archivelist">
				<?php wp_get_archives('type=postbypost&limit=50'); ?>
			  </ul>
			
			<h2 class="archivetitle">Listing by Month</h2>
			  <ul class="archivelist">
				<?php wp_get_archives('type=monthly'); ?>
			  </ul>
		
	</div>	
	<?php get_sidebar(); ?>
	
</div>
<?php get_footer(); ?>
