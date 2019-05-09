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
		/*$navbarSticky = (get_theme_mod( 'sticky_setting' ) == true ? ' fixed-top' : null);
		$navbarColorSch = get_theme_mod( 'navbar_color' );
		switch ($navbarColorSch) {
	    case '#6B757D':
	        $navbarColor = 'navbar-dark';
	        $navbarBackground = 'bg-secondary';
	        break;
	    case '#29A645':
	        $navbarColor = 'navbar-dark';
	        $navbarBackground = 'bg-success';
	        break;
	    case '#DC3545':
	    	$navbarColor = 'navbar-dark';
	        $navbarBackground = 'bg-danger';
	        break;
	    case '#FEC105':
	    	$navbarColor = 'navbar-light';
	        $navbarBackground = 'bg-warning';
	    	break;
	    case '#17A2B8':
	    	$navbarColor = 'navbar-dark';
	        $navbarBackground = 'bg-info';
	    	break;
	    case '#F8F9FA':
	    	$navbarColor = 'navbar-light';
	        $navbarBackground = 'bg-light';
	    	break;
	    case '#343A40':
	    	$navbarColor = 'navbar-dark';
	        $navbarBackground = 'bg-dark';
	    	break;
	    default:
	    	$navbarColor = 'navbar-dark';
	        $navbarBackground = 'bg-primary';
		}*/
		$headerlayout = get_theme_mod('header_layout');


		// var_dump($headerlayout);
		// if (is_admin()) ? 'mt-3' ;'';
	?>
<!-- 	<form method="post" action="header-one.php">
			<input type="hidden" name="navbarSticky" value=<?php $navbarSticky; ?>>
		    <input type="submit">
		    <input type="hidden" name="navbarColor" value=<?php $navbarColor; ?>>
		    <input type="submit">
		    <input type="hidden" name="navbarBackground" value=<?php $navbarBackground; ?>>
		    <input type="submit">
	</form> -->
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

	</div><!-- .container-fluid -->
	<div id="content" class="site-content container">
