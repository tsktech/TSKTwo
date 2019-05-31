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
		<div class="container-fluid">
			<div class="container">
			<div class="row bg-primary">
				<div class="col-md-3">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- .col-md-3 -->
				<div class="col-md-3">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div><!-- .col-md-3 -->
				<div class="col-md-3">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div><!-- .col-md-3 -->
				<div class="col-md-3">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div><!-- .col-md-3 -->
			</div><!-- .row -->
			<div class="site-info">
				&copy; <?php bloginfo( 'name' );
						echo ' - ';
						echo date("Y"); ?>
			</div><!-- .site-info -->
		</div><!--  .container -->
	</div><!-- .container-fluid -->
		<div class="site-info">
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
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
