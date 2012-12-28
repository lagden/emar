<?php get_header(); ?>
<div id="contentwrap">
	<div id="content" class="produtos">
		<?php 
		$lancamentos = new WP_Query(array(
			'post_type' => 'joias', 
			'posts_per_page' => 1,
			'meta_key' => 'lançamento', 
			'meta_value' => '1'
		));

		if ($lancamentos->have_posts()) : while ($lancamentos->have_posts()) : $lancamentos->the_post(); ?>
			<div class="produto" id="post-<?php the_ID(); ?>">
				<div class="imagem">
					<?php $imagem = get_field('imagem_do_produto') ?>
					<img src="<?php echo $imagem['sizes']['large']; ?>" alt="" />
				</div>
				<div class="descricao">
					<?php 
					$categorias = get_the_terms( get_the_ID(), 'Categorias');
					$colecoes 	= get_the_terms( get_the_ID(), 'colecoes');

					echo "<h3>";
					if( $categorias ){
						foreach ($categorias as $cat) {
							echo $cat->name . '<br>';
						}
					}
					echo "<br>";
					if ( $colecoes) {
						foreach ($colecoes as $col) {
							echo $col->name . '<br>';
						}
					}
					echo "</h3>";
					?>
					<p><?php the_field('referencia') ?></p>
				</div>
			</div>
		<?php endwhile; endif; ?>
	
		<div class="relacionados">
			<ul>
			<?php 
			$args = array(
				'post_type' => 'joias', 
				'posts_per_page' => 6,
				'meta_key' => 'lançamento', 
				'meta_value' => '1'
			);

			$relacionados = new WP_Query($args);
			if ($relacionados->have_posts()) : while ($relacionados->have_posts()) : $relacionados->the_post(); ?>
			<li><a href="<?php echo get_permalink( get_the_ID()) ?>">
				<?php $imagem = get_field('imagem_do_produto') ?>
				<img src="<?php echo $imagem['sizes']['thumbnail']; ?>" alt="" />
			</a></li>
			<?php endwhile; endif; ?>
			</ul>
		</div>
	</div>
</div>
<?php get_footer(); ?>