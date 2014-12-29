<?php
/*
Template Name: Home Page
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="main">
	<div class="hero-wrapper">
		<div class="home-hero">
			<h1><img src="<?= get_template_directory_uri().'/images/logo-caoc-white.svg' ?>" alt="City As Our Campus"></h1>
		</div>
		<div class="home-intro">
			<div class="container-fluid">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<div class="home-wrapper">
		<div class="container-fluid">
			<?php if(get_field('homepage_section')): ?>
				<?php while(has_sub_field('homepage_section')) :?>
					<div class="home-section">
						<div class="symbol">
							<img src="<?php the_sub_field('symbol') ?>" alt="">
						</div>
						<div class="text">
							<h2 class="subheading"><a href="<?php the_sub_field('link') ?>"><?php the_sub_field('title'); ?></a></h2>
							<hr>
							<?php the_sub_field('content') ?>
						</div>
						<div class="image">
							<div class="crop">
								<a href="<?php the_sub_field('link') ?>"><img src="<?php the_sub_field('image'); ?>" alt=""></a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
