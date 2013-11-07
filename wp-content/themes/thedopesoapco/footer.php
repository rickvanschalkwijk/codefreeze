<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package thedopesoapco
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrap">
			<div id="go-top" class="bottom-logo">
				<a href="#"><i class="fa fa-angle-double-up"></i></a>
			</div>
			<div id="like-buttons">
				<div class="like-button"></div>
				<div class="like-button"></div>
				<div class="like-button"></div>
		</div>
		<div class="site-info">
			<?php do_action( 'thedopesoapco_credits' ); ?>
			<?php printf( __( 'Proudly powered by %s', 'thedopesoapco' ), 'WordPress' ); ?>
		</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>