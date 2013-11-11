<?php
/*
 Template Name: Work Page
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
					<?php if (have_posts()) : while (have_posts()) : the_post();?>
            				<?php the_content('<p class="serif">Read the rest of this page »</p>'); ?>
    				<?php endwhile; endif; ?>
				</div><!-- .entry-content -->
				</article>
			</div>
		</div>
</div>

<?php get_footer(); ?>