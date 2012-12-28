<?php

// ===================
// = UTILITY METHODS =
// ===================
function show_sidebar_at($position) { return get_option('sidebar_'.$position) == "1" ? true : false; }
function show_search_form() { return get_option('show_search') == "1" ? true : false; }
function show_footer_title() { return get_option('show_footer_title') == "1" ? true : false; }
function show_footer_meta() { return get_option('show_footer_meta') == "1" ? true : false; }
function use_grid() { return get_option('use_grid') == "1" ? true : false; }

// =========================
// = CUSTOM THEME SETTINGS =
// =========================
//add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface(){ add_theme_page( 'More Theme Options', 'More Theme Options', 'edit_themes', basename(__FILE__), 'editglobalcustomfields' ); }

function editglobalcustomfields()
{
	$sidebar_left_status = show_sidebar_at('left') ? "checked=\"yes\"" : "";
	$sidebar_right_status = show_sidebar_at('right') == "1" ? "checked=\"yes\"" : "";
	$sidebar_footer_status = show_sidebar_at('footer') == "1" ? "checked=\"yes\"" : "";
	$use_grid = use_grid() == "1" ? "checked=\"yes\"" : "";
	?>
	<style type="text/css" media="screen">
	
		#theme_options label { font-weight:bold; font-size: 13px; display: block; }
		#theme_options fieldset { border:solid 1px #ccc; padding: 0 10px; margin-top: 10px; margin-bottom: 20px;  }
		#theme_options fieldset legend { 
			padding: 0 10px; 
			font: italic 16px/20px Georgia,"Times New Roman","Bitstream Charter",Times,serif;
			color: #464646;
		}
		#theme_options .extra_info { display: block; font-size:11px; color:#999;}

		#options_general_site_information strong {
			display: block;
			margin-bottom: 10px;
		}
		#options_general_site_information .dev		input,
		#options_general_site_information .sidebars input { float: left; margin-right:5px; }
		#options_general_site_information .dev      label,
		#options_general_site_information .sidebars label {
			clear: right;
			display: block;
			margin-bottom: 10px;
		}
	</style>
	<div class='wrap'>
		<h2>Theme Options</h2>
  		<form method="post" action="options.php" id="theme_options">
	  	  	<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="company_name,site_credit,use_grid,sidebar_left,sidebar_right,sidebar_footer,show_search,show_footer_title,show_footer_meta,custom_menus" />
			<?php wp_nonce_field('update-options') ?>


			<fieldset id="options_general_site_information" class="">
				<legend>General Site Information</legend>
				
				<p>
					<label for="company_name">Your company name</label>
					<input type="text" name="company_name" value="<?php echo htmlspecialchars(get_option('company_name')); ?>" id="company_name" size="40" />
				</p>

				<p>
					<label for="company_name">Site Credit</label>
					<input type="text" name="site_credit" value="<?php echo htmlspecialchars(get_option('site_credit')); ?>" id="site_credit" size="40" />
				</p>

				<p class="dev">
					<strong>Would you like to use the 960px grid in your theme?</strong>
					
					<input type="checkbox" name="use_grid" value="1" id="use_grid" <?php echo $use_grid; ?> /> <label for="use_grid">Yes</label>
				</p>

				<p class="sidebars">
					<strong>Which sidebars would you like to see?</strong>

					<input type="checkbox" name="sidebar_left" value="1" id="sidebar_left" <?php echo $sidebar_left_status ?> /> <label for="sidebar_left">Left Sidebar</label>

					<input type="checkbox" name="sidebar_right" value="1" id="sidebar_right" <?php echo $sidebar_right_status ?> /> <label for="sidebar_right">Right Sidebar</label>

					<input type="checkbox" name="sidebar_footer" value="1" id="sidebar_footer" <?php echo $sidebar_footer_status ?> /> <label for="sidebar_footer">Footer Sidebar</label>
				</p>
				
			</fieldset>

			<fieldset id="options_header" class="">
				<legend>Header</legend>
				
				<p>
					<label for="">Show search form in the header?</label>
					<select name="show_search" id="show_search">
					<?php if (show_search_form()) : ?>
						<option value="1" selected="selected">Yes</option>
						<option value="0">No</option>
					<?php else : ?>
						<option value="1">Yes</option>
						<option value="0" selected="selected">No</option>
					<?php endif; ?>
					</select>
				</p>
				
			</fieldset>

			<fieldset id="options_footer" class="">
				<legend>Footer</legend>
				
				<p>
					<label for="show_footer_title">Show website title?</label>
					<select name="show_footer_title" id="show_footer_title">
						<?php if (show_footer_title()) : ?>
							<option value="1" selected="selected">Yes</option>
							<option value="0">No</option>
						<?php else : ?>
							<option value="1">Yes</option>
							<option value="0" selected="selected">No</option>
						<?php endif; ?>
					</select>
				</p>
				
				<p>
					<label for="show_footer_meta">Show Meta Links?</label>
					<select name="show_footer_meta" id="show_footer_meta">
						<?php if (show_footer_meta()) : ?>
							<option value="1" selected="selected">Yes</option>
							<option value="0">No</option>
						<?php else : ?>
							<option value="1">Yes</option>
							<option value="0" selected="selected">No</option>
						<?php endif; ?>
					</select>
				</p>
				
				<p>
					<label for="custom_menus_to_include">Custom Menus to Include</label>
					<span class="extra_info">
						Place the titles of the custom menus in the following form field delimited by commas.  
						Menus will then be included in the theme footer.
					</span>
					<input type="text" name="custom_menus" value="<?php echo strip_tags(get_option('custom_menus')); ?>" id="custom_menus" size="40" />
					
				</p>
				
			</fieldset>

			<p><input type="submit" name="Submit" value="Update Options" /></p>

	  	</form>
	</div>
	<?php
}

// =======================
// = SET UP THE SIDEBARS =
// =======================
if (function_exists('register_sidebar'))
{
	if(show_sidebar_at('left')){ register_sidebar(array('name'=>'sidebar left')); }
	if(show_sidebar_at('right')){ register_sidebar(array('name'=>'sidebar right')); }
	if(show_sidebar_at('footer')){ register_sidebar(array('name'=>'sidebar footer')); }
}

// ===================================
// = ADD NEW CLASSES TO body_class() =
// ===================================
function sidebar_number_class($classes) 
{
	$columns = 1;
	if(show_sidebar_at('left')) { $columns++; $classes[] = "left-column"; }
	if(show_sidebar_at('right')) { $columns++; $classes[] = "right-column";  }
	
	if($columns == 1){ $classes[] = "one-column"; }
	if($columns == 2){ $classes[] = "two-column"; }
	if($columns == 3){ $classes[] = "three-column"; }
	
	if(use_grid()){ $classes[] = "grid"; }
	 
	// return the $classes array
	return $classes;
}
add_filter('body_class','sidebar_number_class');

// ============
// = TWEAK WP =
// ============
if (function_exists( 'add_theme_support' ))
{
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	add_theme_support('automatic-feed-links');
	register_nav_menus(
  		array(
  		  'primary_navigation' => 'Primary Navigation',
  		  'utility_navigation' => 'Utility Navigation'
  		)
  	);
}

// Clean up the <head>
function removeHeadLinks()
{
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
}
add_action('init', 'removeHeadLinks');

class Main_Menu_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args)
	{
		global $post;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		if( isset($post) && in_array( $post->post_type, split( '/', $item->url ) ) ){
			$classes[] = 'current-menu-item';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		// var_dump( $item );
		// var_dump( $post );
		// var_dump( $classes );
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID ).$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
?>
