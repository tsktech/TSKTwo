<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage tsktwo
 * @since 1.0
 * @version 1.0
 */

?>
<section id="footer-info">
	<div class="site-info footer-copyright text-center text-white py-3">
		&copy; <?php bloginfo( 'name' );
				echo ' - ';
				echo date("Y"); ?>
		<span class="sep"> | </span>
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tsktwo' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'tsktwo' ), 'WordPress' );
			// var_dump(is_admin());
			// var_dump(is_admin_bar_showing());
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf( esc_html__( 'Theme: %1$s by %2$s.', 'tsktwo' ), 'tsktwo', '<a href="http://www.tskamath.com">Srikanth Kamath</a>' );
		?>
		<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( ' | ', '<span role="separator" aria-hidden="true"></span>' );
			}
		?>
	</div><!-- .site-info -->
</section><!-- #footer-info -->
