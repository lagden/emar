<?php get_header(); ?>

	<?php if(show_sidebar_at('left')) { get_sidebar('left'); } ?>
	<section id="posts">
		<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<!-- POSTS // begin -->
			<?php while (have_posts()) : the_post(); ?>
				<!-- POST // begin -->
				<article id="post-<?php the_ID(); ?>" class="post">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<cite>
						<span class="date">Postedo em: <abbr title="<?php the_time('Y-d-m\TG:i:s') ?>" class="published"><?php the_time('l - d de F de Y') ?></abbr></span>
					</cite>
					
					<?php the_content('Continuar lendo &raquo;'); ?>
					
					<footer class="post-info">
						<?php edit_post_link('Moderate','','|'); ?>
						<?php comments_popup_link('Nenhum Comentário &#187;', '1 Comentário &#187;', '% Comentários &#187;'); ?>
					</footer>
				</article>
				<!-- POST // end -->
			<?php endwhile; ?>
			<nav>
				<div class="previous"><?php next_posts_link('&laquo; Posts anteriores') ?></div>
				<div class="next"><?php previous_posts_link('Próximos posts &raquo;') ?></div>
			</nav>
			<!-- POSTS // end -->
		<?php else : ?>
			<!-- NO POSTS  // woops -->
			<article>
				<h2>Nenhum Post(s) encontrado</h2>
			</article>
		<?php endif; ?>
	</section>
	<?php if(show_sidebar_at('right')) { get_sidebar ('right'); } ?>

<?php get_footer(); ?>
