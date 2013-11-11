<?php
/*
 Template Name: Serives custom
*/
get_header();
?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<div class="wrap">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				<div class="entry-content full-width">
					<div id="services-block">
						<div class="service-block">
                            <canvas id="circle" width="250" height="250"></canvas>
							<!--<h1 id="circle" class="circle">D</h1>-->
							<h2>Design</h2>
							<p></p>
						</div>
						<div class="service-block">
							<h1 class="circle">H</h1>
							<h2>HTML5/CSS3</h2>
							<p></p>
						</div>
						<div class="service-block">
							<h1 class="circle">D</h1>
							<h2>Development</h2>
							<p></p>
						</div>
						<div class="service-block">
							<h1 class="circle">H</h1>
							<h2>Hosting Advice</h2>
							<p></p>
						</div>
						<div class="service-block">
							<h1 class="circle">A</h1>
							<h2>Android development</h2>
							<p></p>
						</div>
						<div class="service-block">
							<h1 class="circle">C</h1>
							<h2>CMS</h2>
							<p></p>
						</div>
					</div>
				</div><!-- .entry-content -->
				</article>
			</div>
		</div>
</div>

<?php get_footer(); ?>