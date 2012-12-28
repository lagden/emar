<?php 

get_header('preto'); 
?>
<div id="contentwrap">
	<div id="content" class="lista-items eventos">
		<?php while (have_posts()) : the_post(); ?>
			<div class="evento grid-item" id="post-<?php the_ID(); ?>" style="background-image:url('<?php the_field('capa') ?>')">
                <a href="<?php echo get_permalink(get_the_ID()) ?>">
                    <span><?php the_title(); ?></span>
                    <span class="bottom">clique e saiba mais</span>
                </a>
			</div>
		<?php endwhile;?>
	</div>
</div>
<?php get_footer('preto'); ?>