<?php get_header('preto'); ?>
<div id="contentwrap">
	<div id="content">
		<a href="<?php echo site_url() . '/imprensa' ?>/" class="bt-voltar white">voltar</a>
		<ul class="galeria">
		<?php while (have_posts()) : the_post(); ?>
			<?php 
			$fotos = get_field('fotos');
			foreach ($fotos as $foto) {
				echo '<li><img src="' . $foto['url'] . '" /></li>';
			}
			?>
		<?php endwhile;?>
		</ul>
	</div>
</div>
<?php get_footer('preto'); ?>