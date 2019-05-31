<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TSKTwo
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<section id="footer">
			<div class="container">
				<div class="row text-center text-xs-center text-sm-left text-md-left pt-2">
					<div class="col-md-3">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<div class="col-md-3">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
					<div class="col-md-3">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
					<div class="col-md-3">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #footer -->
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
			</div><!-- .site-info -->
		</section><!-- #footer-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
