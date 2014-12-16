	<footer role="banner">
		<div class="container-fluid">

			<?php dynamic_sidebar( 'global-footer' ); ?>
			<div class="section">
				<h3><a href="/news"><img src="<?= get_template_directory_uri().'/images/symbol-news.svg' ?>" alt=""> News</a></h3>
				<? $args = array( 'posts_per_page' => 3 );
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<div class="news-teaser">
						<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
							<h4><?php the_title(); ?></h4>
							<p><?php the_excerpt(); ?></p>
						</a>
					</div>
				<?php endforeach; wp_reset_postdata();?>

			</div>
		</div>
	</footer>
