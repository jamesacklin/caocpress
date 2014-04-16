<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="main">
	<div class="container-fluid">
		<div class="row">
			<article>
				<div class="content">
					<header>
						<h2 class="subheading"><?php the_title(); ?></h2>
					</header>
					<?php the_content(); ?>
				</div>
				<footer>
					<p class="byline">Posted on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> by <?= get_the_author(); ?></p>
					<div class="share">
						<p><span class="smallcaps">Share:</span>
							<a href="#" class="text-btn">Facebook</a>
							<a href="#" class="text-btn">Twitter</a>
							<a href="#" class="text-btn">G+</a>
							<a href="#" class="text-btn">LinkedIn</a>
						</p>
					</div>
				</footer>
			</article>
		</div>
	</div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>