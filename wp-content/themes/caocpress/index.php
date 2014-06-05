<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>


<div class="main">
	<div class="container-fluid">
			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="row">
					<article>
						<div class="content">
							<div class="header">
								<p class="byline">Posted on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time></p>
								<h2 class="subheading"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							</div>
							<?php the_content(); ?>
						</div>
						<footer>
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
					<aside>
						<? // Tag list ?>
						<?php the_tags('<div class="section"><h4 class="subheading">Tags</h4><ul class="tag-list"><li>','</li><li>','</li></ul></div>'); ?>
						<? // Content areas (from custom fields) ?>
						<?php if(get_field('content_areas')): ?>
							<?php while(has_sub_field('content_areas')) :?>
								<div class="section">
										<h4 class="subheading"><?php the_sub_field('header') ?></h4>
										<?php the_sub_field('content'); ?>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</aside>
				</div>
				<?php endwhile; ?>
			<?php else: ?>
				<div class="row">
				<article>
					<div class="content">
						<h2>No posts to display</h2>
					</div>
				</article>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
