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
		</div>
		<div id="start-project">
			<p>Start a project <a class="btn" href="./start-a-project">Get in touch</a></p>
		</div>
		<div id="like-bar">
			<div class="wrap border">
					<p class="connect">Connect with us: 
						<ul class="connect-list">
							<li><a href="" target="_blank" alt=""><i class="fa fa-linkedin-square"></i>  LinkedIn</a></li>
							<li><a href="" target="_blank" alt=""><i class="fa fa-github-square"></i>  GitHub</a></li>
							<li><a href="" target="_blank" alt=""><i class="fa fa-google-plus-square"></i>  Google+</a></li>
							<li><a href="" target="_blank" alt=""><i class="fa fa-linux"></i>  LaunchPad</a></li>
						</ul>

					<p class="contact">Contact us: 
					<ul class="contact-list">
						<li><a href="" target="_blank" alt=""><i class="fa fa-envelope"></i>  info@thedopesoapco.nl</a></li>
						<li><a href="" target="_blank" alt=""><i class="fa fa-phone-square"></i>   06 5756 26 19</a></li>
					</ul>

			</div>
		</div>
		<div class="wrap">
			<div class="site-info">
				<?php do_action( 'thedopesoapco_credits' ); ?>
				<?php print ('<p>Proudly powered by WordPress' ); ?>
				<?php print ( date('Y') . ' CodeFreeze - All Rights Reserved</p>');?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>