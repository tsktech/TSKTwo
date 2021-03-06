<?php
/**
 * TSKTwo Theme Customizer
 *
 * http://ottopress.com/2015/whats-new-with-the-customizer/
 * @package TSKTwo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tsktwo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'tsktwo_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'tsktwo_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'tsktwo_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tsktwo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tsktwo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tsktwo_customize_preview_js() {
	wp_enqueue_script( 'tsktwo-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tsktwo_customize_preview_js' );

/*
 * Theme Customisation
 */
if ( class_exists('Kirki') ) {
	Kirki::add_config( 'tsktwo_theme', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	Kirki::add_panel( 'theme_mod', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Customisation', 'tsktwo' ),
	    'description' => esc_html__( 'Customisation of theme', 'tsktwo' ),
	) );
	Kirki::add_section( 'navbar_section', array(
	    'title'          => esc_html__( 'Header and Navbar Section', 'tsktwo' ),
	    'description'    => esc_html__( 'change the look & feel of header and navbar.', 'tsktwo' ),
	    'panel'          => 'theme_mod',
	    'priority'       => 160,
	) );
	Kirki::add_field( 'tsktwo_theme', [
		'type'        => 'select',
		'settings'    => 'header_layout',
		'label'       => esc_html__( 'Select Header', 'tsktwo' ),
		'section'     => 'navbar_section',
		'default'     => 'headerone',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'headerone'   => esc_html__( 'Header One', 'tsktwo' ),
			'headertwo'   => esc_html__( 'Header Two', 'tsktwo' ),
			'headerthree' => esc_html__( 'Header Three', 'tsktwo' ),
			'headerfour'  => esc_html__( 'No Header Sticky Navbar', 'tsktwo' ),
		],
	] );
	Kirki::add_field( 'tsktwo_theme', [
		'active_callback' => 'headerthree_callback',
		'type'     => 'text',
		'settings' => 'topnav_email',
		'label'    => esc_html__( 'Email ID for Header Three', 'tsktwo' ),
		'section'  => 'navbar_section',
		'default'  => esc_html__( 'Email Id for Support', 'tsktwo' ),
		'priority' => 10,
		'sanitize_callback' => 'tsktwo_sanitize_email',
	] );
	Kirki::add_field( 'tsktwo_theme', [
		'active_callback' => 'headerthree_callback',
		'type'     => 'text',
		'settings' => 'topnav_mobil',
		'label'    => esc_html__( 'WhatsApp Number for Header Three', 'tsktwo' ),
		'section'  => 'navbar_section',
		'default'  => esc_html__( 'WhatsApp Mobil for Support', 'tsktwo' ),
		'priority' => 10,
		/*'sanitize_callback' => 'tsktwo_sanitize_phone',*/
	] );

	Kirki::add_field( 'tsktwo_theme', [
		'active_callback' => 'headerfour_callback',
		'type'        => 'color-palette',
		'settings'    => 'header_color',
		'label'       => esc_html__( 'Header Color Scheme', 'tsktwo' ),
		'description' => esc_html__( 'Customise the Header Color', 'tsktwo' ),
		'section'     => 'navbar_section',
		'default'     => '#007BFF',
		'choices'     => [
			'colors' => [ '#007BFF', '#6B757D', '#29A645', '#DC3545', '#FEC105', '#17A2B8', '#F8F9FA', '#343A40' ],
			'style'  => 'round',
			'size'   => 25,
		],
	] );
	Kirki::add_field( 'tsktwo_theme', [
		'type'        => 'color-palette',
		'settings'    => 'navbar_color',
		'label'       => esc_html__( 'Navbar Color Scheme', 'tsktwo' ),
		'description' => esc_html__( 'Customise the Navbar Color & Menu Text', 'tsktwo' ),
		'section'     => 'navbar_section',
		'default'     => '#007BFF',
		'choices'     => [
			'colors' => [ '#007BFF', '#6B757D', '#29A645', '#DC3545', '#FEC105', '#17A2B8', '#F8F9FA', '#343A40' ],
			'style'  => 'round',
			'size'   => 25,
		],
	] );
	Kirki::add_field( 'tsktwo_theme', [
		'type'        => 'color-palette',
		'settings'    => 'link_color',
		'label'       => esc_html__( 'Previous Next Button Color', 'tsktwo' ),
		'description' => esc_html__( 'Customise the Button Color', 'tsktwo' ),
		'section'     => 'navbar_section',
		'default'     => '#007BFF',
		'choices'     => [
			'colors' => [ '#007BFF', '#6B757D', '#29A645', '#DC3545', '#FEC105', '#17A2B8', '#F8F9FA', '#343A40' ],
			'style'  => 'round',
			'size'   => 25,
		],
	] );


	/*Kirki::add_field( 'tsktwo_theme', [
		'type'        => 'checkbox',
		'settings'    => 'sticky_setting',
		'label'       => esc_html__( 'Sticky Header', 'tsktwo' ),
		'description' => esc_html__( 'Navbar scrolls with the page until it reaches the top, then stays there)', 'tsktwo' ),
		'section'     => 'navbar_section',
		'default'     => false,
	] );*/



}

function tsktwo_sanitize_email ( $value ) {
	// return "not so nice";
	if ( is_email( $value ) ) {
		return sanitize_email( $value ) ;
	} else {
		return esc_html__( 'not a valid Email ID', 'tsktwo' );
	}
}
function tsktwo_sanitize_phone ( $value ) {
	// return "not so nice";
/*	if ( is_email( $value ) ) {
		return sanitize_email( $value ) ;
	} else {
		return esc_html__( 'not a valid Email ID', 'tsktwo' );
	}*/
}
function headerthree_callback( $control ) {
   if ( $control->manager->get_setting('header_layout')->value() == 'headerthree' ) {
      return true;
   } else {
      return false;
   }
}

function headerfour_callback( $control ) {
   if ( $control->manager->get_setting('header_layout')->value() !== 'headerfour' ) {
      return true;
   } else {
      return false;
   }
}


