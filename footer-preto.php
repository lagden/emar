			<footer class="txt-branco">
				<div class="direitos">
					<p> Emar Batalha &copy;<?php echo date('Y').'';?>. Todos os direitos reservados.</p>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.jcarousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.pikachoose.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

<?php if (GOOGLE_ANALYTICS_ID) : ?>
<script>
  var _gaq=[['_setAccount','aaaaa'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

</body>
</html>