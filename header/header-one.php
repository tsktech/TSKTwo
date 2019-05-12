<?php
		/*$navbarSticky = (get_theme_mod( 'sticky_setting' ) == true ? '' fixed-top tsk-fixed-top : null);*/
		/*
		if (get_theme_mod( 'sticky_setting' ) == true) {
			$navbarSticky = ' fixed-top tsk-fixed-top';
			$minH = '150px';
		} else {
			$navbarSticky = null;
			$minH = '90px';
		}*/
		// var_dump('header-one.php');
		$navbarSticky = null;
		$minH = '200px';
		if (is_admin_bar_showing()) {
			$navbarSticky .= ' mt-3';
		}

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
		}
		// $headerlayout = get_theme_mod('header_layout');

		// var_dump($headerSticky);
		// if (is_admin()) ? 'mt-3' ;'';
?>


<header id="masthead" class="site-header" style="min-height:<?php echo $minH; ?>">
	<div class="container banner header-wrap">
		<div class="row">
			<div class="tsk-logo col-md-4 px-2">
				<h2>this is test</h2>
				<p>Laborum dolor culpa mollit elit id ex.</p>
			</div><!-- .tsk-logo col-md-4 -->
			<div class="tsk-navbar col-md-8">
				<span class="float-md-right">
				<h2>this is test</h2>
				<p>Laborum dolor culpa mollit cillum minim ut elit id ex.</p>
				</span>
			</div><!-- .tsk-navbar col-md-8 -->
		</div><!-- .row -->
	</div><!-- .banner header-wrap -->
	<nav id="menu" class="navbar navbar-expand-lg<?php echo $navbarSticky; echo " " . $navbarColor . " "; echo $navbarBackground;?>" role="navigation" >
		<div class="container">
			<div class="site-branding navbar-brand">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$tsktwo_description = get_bloginfo( 'description', 'display' );
				if ( $tsktwo_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $tsktwo_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- https://developer.wordpress.org/reference/functions/wp_nav_menu/-->
			<!-- 'menu_id'			=> 'primary-1', -->
			<?php
				wp_nav_menu([
					'menu'				=> 'primary',
					'menu_class'		=> 'navbar-nav ml-auto',
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'bs4navbar',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'depth'             => 2, // 1 = no dropdowns, 2 = with dropdowns.
					'walker'            => new WP_Bootstrap_Navwalker(),
					'theme_location'    => 'primary' // registered with register_nav_menu()
				]);
			?>
		</div><!-- .container	-->
	</nav><!-- nav #menu -->
</header><!-- #masthead -->
