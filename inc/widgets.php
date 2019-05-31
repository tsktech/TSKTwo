<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tsktwo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'tsktwo' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'tsktwo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'tsktwo' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'tsktwo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'tsktwo' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'tsktwo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'tsktwo' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'tsktwo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'tsktwo' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'tsktwo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'tsktwo_widgets_init' );
