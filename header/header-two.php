<?php
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

        $headerColorSch = get_theme_mod( 'header_color' );
        switch ($headerColorSch) {
        case '#6B757D':
            $headerColor = 'navbar-dark';
            $headerBackground = 'bg-secondary';
            $searchBtn = 'btn-secondary';
            break;
        case '#29A645':
            $headerColor = 'navbar-dark';
            $headerBackground = 'bg-success';
            $searchBtn = 'btn-success';
            break;
        case '#DC3545':
            $headerColor = 'navbar-dark';
            $headerBackground = 'bg-danger';
            $searchBtn = 'btn-danger';
            break;
        case '#FEC105':
            $headerColor = 'navbar-light';
            $headerBackground = 'bg-warning';
            $searchBtn = 'btn-warning';
            break;
        case '#17A2B8':
            $headerColor = 'navbar-dark';
            $headerBackground = 'bg-info';
            $searchBtn = 'btn-info';
            break;
        case '#F8F9FA':
            $headerColor = 'navbar-light';
            $headerBackground = 'bg-light';
            $searchBtn = 'btn-light';
            break;
        case '#343A40':
            $headerColor = 'navbar-dark';
            $headerBackground = 'bg-dark';
            $searchBtn = 'btn-dark';
            break;
        default:
            $headerColor = 'navbar-dark';
            $headerBackground = 'bg-primary';
            $searchBtn = 'btn-primary';
        }
?>


<header id="masthead" class="site-header">
    <!-- <div class="row"> -->
    <div id="secondary" class="navbar navbar-expand-lg <?php echo $headerColor . " "; echo $headerBackground;?> navbar-new-top" role="navigation" >
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
            <div class="navbar btnSearch">
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn <?php echo $searchBtn; ?> my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div><!-- .div btnSearch -->
        </div><!-- .container   -->
    </div><!-- div #secondary -->
    <!-- </div> .row
    <div class="row"> -->

    <div class="navbar-placeholder">
        <nav id="menu" class="navbar navbar-expand-lg<?php echo $navbarSticky; echo " " . $navbarColor . " "; echo $navbarBackground;?>" role="navigation" >
            <div class="container">
                <!-- <?php the_custom_logo(); ?> -->
                <!-- <a>Hello</a> -->
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- https://developer.wordpress.org/reference/functions/wp_nav_menu/-->
                <!-- 'menu_id'          => 'primary-1', -->
                <?php
                    wp_nav_menu([
                        'menu'              => 'primary',
                        'menu_class'        => 'navbar-nav mr-auto ml-0',
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs4navbar',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'depth'             => 2, // 1 = no dropdowns, 2 = with dropdowns.
                        'walker'            => new WP_Bootstrap_Navwalker(),
                        'theme_location'    => 'primary' // registered with register_nav_menu()
                    ]);
                ?>
            </div><!-- .container   -->
        </nav><!-- nav #menu -->
    </div><!-- .navbar-placeholder -->
<!-- </div .row -->
</header><!-- header -->
