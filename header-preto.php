<!doctype html>  

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php
		if (is_single()){ single_post_title(); echo ' | ';  bloginfo( 'name' );
		} elseif (is_home() || is_front_page()){ bloginfo( 'name' ); if(get_bloginfo( 'description' )){ echo ' | ' ; bloginfo( 'description' ); }
		} elseif ( is_page() ){ single_post_title( '' ); echo ' | '; bloginfo( 'name' );
		} elseif ( is_search() ){ printf( __( 'Search results for "%s"', '' ), get_search_query() ); echo ' | '; bloginfo( 'name' );
		} elseif ( is_404() ){ _e( 'Not Found', '' ); echo ' | '; bloginfo( 'name' );
		} else { wp_title(''); echo ' | '; bloginfo( 'name' ); }
	?></title>
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="alternate"  href="<?php bloginfo('rss2_url'); ?>"    type="application/rss+xml"  title="RSS 2.0" />
	<link rel="alternate"  href="<?php bloginfo('rss_url'); ?>"     type="text/xml" 			title="RSS .92" />
	<link rel="alternate"  href="<?php bloginfo('atom_url'); ?>"    type="application/atom+xml" title="Atom 0.3" />
	<link rel="pingback"   href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />

	<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
</head>
<?php 
$background = get_field('imagem_de_fundo');
$repeticao 	= get_field('repeticao_do_fundo');
$posicao 	= get_field('posicao_do_fundo');
$cor_menu 	= get_field('header_bgcolor');
$tamanho 	= $repeticao == 'no-repeat' ? 'cover': '' ;

if( ! $background ) $background = get_template_directory_uri() . '/images/bg_padrao.jpg';
if( ! $repeticao ) 	$repeticao = 'no-repeat';
if( ! $posicao ) 	$posicao = 'right top';
if( ! $cor_menu ) 	$cor_menu = 'transparent';

global $post;
$paginas_sem_fundo = array('eventos', 'imprensa');
if( in_array($post->post_type, $paginas_sem_fundo) ){
	$background = get_template_directory_uri() . '/images/bg_eventos.png';
	$posicao = 'center top';
	$repeticao = 'repeat-y';
} 
?>
<body <?php if(is_front_page()): ?>id="home"<?php endif; ?> <?php body_class($post->post_type); ?> style="background-image:url('<?php echo $background; ?>'); background-repeat: <?php echo $repeticao; ?>; background-position: <?php echo $posicao; ?>; background-size: <?php echo $tamanho ?>;">
	<div id="container">
		<header>
			<div class="logo <?php the_field('cor_do_logo'); ?>">
				<h1 class="vermelho"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
			</div>
			
			<nav id="primary" class="branco">
				<?php wp_nav_menu( array(
					'menu' => 'Primary Navigation',
					'walker' => new Main_Menu_Walker
				)); ?>
			</nav>
		</header>