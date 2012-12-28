<?php get_header(); ?>
<div id="contentwrap">
	<div id="content" class="produtos">
		<?php while (have_posts()) : the_post(); ?>
			<div class="produto" id="post-<?php the_ID(); ?>">
				<div class="imagem">
					<?php $imagem = get_field('imagem_do_produto') ?>
					<a class="js-boxinfo fancybox.ajax" href="<?php bloginfo('url'); ?>/informacao?produto=<?php the_ID(); ?>">
						<img src="<?php echo $imagem['sizes']['large']; ?>" alt="" />
					</a>
				</div>
				<div class="descricao">
					<?php 
					$categorias = get_the_terms( get_the_ID(), 'Categorias');
					$colecoes 	= get_the_terms( get_the_ID(), 'colecoes');

					$s_cat="";
					$s_col="";

					echo "<h3>";
					if( $categorias ){
						foreach ($categorias as $cat) {
							$s_cat = $cat->name;
							echo $cat->name . '<br>';
						}
					}
					echo "<br>";
					if ( $colecoes) {
						foreach ($colecoes as $col) {
							$s_col = $col->name;
							echo $col->name . '<br>';
						}
					}
					echo "</h3>";
					?>
					<p><?php the_field('referencia') ?></p>
				</div>
				<div class="shareit">
					<?php $subMail = "Indicação de Emmar Batalha" ?>
					<?php $bodyMail = "Indicação do seguinte produto: {$s_cat} - {$s_col} | ref.: " . get_field('referencia') . " - " . get_permalink() ?>
					<a target="_blank" href="mailto:?subject=<?php echo urlencode($subMail) ?>&amp;body=<?php echo urlencode($bodyMail) ?>" rel="nofollow">
						<img src="<?php echo get_template_directory_uri(); ?>/images/ico_indica.png" alt="">
						<span>Indique para uma amiga(o)</span>
					</a>
					<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/ico_facebook.png" alt="">
					</a>
					<a class="js-boxinfo fancybox.ajax" href="<?php bloginfo('url'); ?>/informacao?produto=<?php the_ID(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/ico_emar.png" alt="">
					</a>
				</div>
				<?php $term = array_shift( $categorias ); ?>
				<a href="<?php echo site_url() . '/' .$term->taxonomy .'/'. $term->slug ?>/" class="bt-voltar">voltar</a>
				<?php previous_post_link(); ?> 
				<?php next_post_link(); ?> 
			</div>
		<?php endwhile;?>
	
		<div class="relacionados">
			<div class="navegacao clearfix">
				<div class="left">relacionados</div>
				<div class="right"></div>
			</div>
			<ul>
			<?php 
			

			$args = array(
				'post_type' => 'joias', 
				'posts_per_page' => 6,
				'taxonomy' => $term->taxonomy, 
				'term' => $term->slug,
				'post__not_in' => array($post->ID)
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