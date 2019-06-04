<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TSKTwo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- customistation of header !-->
	<?php
		$headerlayout = get_theme_mod('header_layout');
		// var_dump($headerlayout);
		// if (is_admin()) ? 'mt-3' ;'';
	?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tsktwo' ); ?></a>
	<div class="container-fluid">
		<?php
				// $headerlayout = get_theme_mod('storevilla_pro_header_type','header_layout');
				// $headerlayout = 'headerone';
				if($headerlayout == 'headerone'){
					// var_dump('header-ones.php');
					get_template_part('header/header', 'one');
				}else if($headerlayout == 'headertwo'){
					get_template_part('header/header', 'two');
				}else if($headerlayout == 'headerthree'){
					get_template_part('header/header', 'three');
				}else{
					get_template_part('header/header', 'four');
				}
		?>
	<?php if(!is_front_page() && function_exists('get_breadcrumb')) : ?>
		<!-- if (function_exists( -->
		<div class="breadcrumb-wrapper mb-3 container-fluid">
			<?php get_breadcrumb(); ?>
		</div><!-- .breadcrumb-wrapper .container-fluid  -->
	<?php endif; ?>
	<div id="content" class="site-content container">
		<div class="row">
