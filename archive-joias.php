<?php get_header(); ?>
<div id="contentwrap">
	<div id="content" class="categorias">
		<ul class="grid-container">
			
		<?php 

		$tax_name = 'Categorias' ;
		$args = array(
			'hide_empty' 	=> 0,
			'orderby' 		=> 'name'
		); 
		
		$categorias = get_terms($tax_name, $args);

		foreach ($categorias as $cat) {
			$imagem = get_field('imagem', $tax_name . '_' . $cat->term_id);
			?>
			<li style="background-image:url('<?php echo $imagem['url'] ?>')">
				<a href="<?php echo site_url($tax_name . '/' . $cat->slug) ?>"><span><?php echo $cat->name ?></span></a>
			</li>	
			<?php
		}
		?>
		</ul>
	</div>
</div>
<?php get_footer(); ?>