<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage tsktwo
 * @since 1.0
 * @version 1.0
 */

?>
<?php
if ( is_active_sidebar( 'footer-1' ) ||
	 is_active_sidebar( 'footer-2' ) ||
	 is_active_sidebar( 'footer-3' ) ||
	 is_active_sidebar( 'footer-4' ) ) :
	?>

<section id="footer">
	<div class="container">
		<div class="row text-center text-xs-center text-sm-left text-md-left pt-2">
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
	</div><!-- .container -->
</section><!-- #footer -->

<?php endif; ?>

