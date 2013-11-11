<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package thedopesoapco
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Share+Tech' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
    <script>
        function draw(){
         (function() {
  var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                              window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
  window.requestAnimationFrame = requestAnimationFrame;
})();
 

var canvas = document.getElementById('circle');
        console.log(canvas);
 var context = canvas.getContext('2d');
 var x = canvas.width / 2;
 var y = canvas.height / 2;
 var radius = 75;
 var endPercent = 85;
 var curPerc = 0;
 var counterClockwise = false;
 var circ = Math.PI * 2;
 var quart = Math.PI / 2;

 context.lineWidth = 10;
 context.strokeStyle = '#ad2323';
 context.shadowOffsetX = 0;
 context.shadowOffsetY = 0;
 context.shadowBlur = 10;
 context.shadowColor = '#656565';


 function animate(current) {
     context.clearRect(0, 0, canvas.width, canvas.height);
     context.beginPath();
     context.arc(x, y, radius, -(quart), ((circ) * current) - quart, false);
     context.stroke();
     curPerc++;
     if (curPerc < endPercent) {
         requestAnimationFrame(function () {
             animate(curPerc / 100)
         });
     }
 }

 animate();
        }
    </script>
</head>
<body onload="draw();" <?php body_class(); ?>>
	<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<a href="https://github.com/rickvschalkwijk"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
			<div class="site-branding">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</header>
		<!-- #masthead -->
		<div id="site-nav">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'thedopesoapco' ); ?></h1>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'thedopesoapco' ); ?></a>
				<div class="wrap">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
		</nav>
		</div>
		<!-- #site-navigation -->
		<div id="content" class="site-content">