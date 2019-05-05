<?php

// include custom Jquery
function tsktwo_include_custom_jquery() {
	if ( ! is_admin() ) {
		wp_deregister_script('jquery');
		//wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js', array(), null, false);
		//wp_enqueue_script( 'jquery');
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js', array(), null, true);
	}
}
// add_action( 'init', 'tsktwo_include_custom_jquery' );
 add_action( 'wp_enqueue_scripts', 'tsktwo_include_custom_jquery' );

/**
 * Enqueue scripts and styles.
 */
function tsktwo_scripts() {
	wp_enqueue_style( 'tsktwo-style-min', get_template_directory_uri () . '/sass/style.min.css' );
	// wp_enqueue_style( 'tsktwo-mdc-min', 'https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css');
	// wp_enqueue_style( 'tsktwo-google-fonts', 'https://fonts.googleapis.com/icon?family=Material+Icons', false );


	wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js', false, '', true);
	wp_enqueue_script('popper');
	// wp_register_script( 'mdc-js', 'https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js', false, '', true);
	// wp_enqueue_script('mdc-js');
	wp_enqueue_script( 'tsktwo-js', get_template_directory_uri() . '/dist/js/tsktwo.js', array('jquery'), '20190429' , true);


	/*wp_enqueue_style( 'tskone-style', get_stylesheet_uri() );

	wp_enqueue_script( 'tskone-navigation', get_template_directory_uri() . '/src/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tskone-skip-link-focus-fix', get_template_directory_uri() . '/src/js/skip-link-focus-fix.js', array(), '20151215', true );*/

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tsktwo_scripts' );

// change th login-logo
function tsktwo_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/LogoTsktechwithGlow.png);
			height:120px;
			width:350px;
			background-size: 350px 120px;
			background-repeat: no-repeat;
	        padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'tsktwo_login_logo' );

function tsktwo_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'tsktwo_login_logo_url' );

function tsktwo_login_logo_url_title() {
    return 'TSKOne Theme development WP';
}
add_filter( 'login_headertitle', 'tsktwo_login_logo_url_title' );
