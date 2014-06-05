<?php
/**
 * The Template for displaying all single posts
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
				<? if(has_post_thumbnail()): ?>
					<div class="crop">
						<? the_post_thumbnail('full') ?>
					</div>
				<? endif; ?>
				<div class="content">
					<header>
						<p class="byline">Posted on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time></p>
						<h2 class="subheading"><?php the_title(); ?></h2>
					</header>
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
	</div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
