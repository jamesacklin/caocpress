	<footer role="banner">
		<div class="container-fluid">
			<div class="row">
				<div class="section">
					<h3><img src="<?= get_template_directory_uri().'/images/symbol-toolkit.svg' ?>" alt=""> Toolkit</h3>
					<p>Explore resources on the history and development of the City as our Campus program. Download Implementation Guides on topics such as forming and maintaining partnerships and how to strategically manage logistics and administrative tasks. Participate in webinars hosted by Winchester Thurston administrators, teachers, and students on topics related to the program.</p>
				</div>
				<div class="section">
					<h3><img src="<?= get_template_directory_uri().'/images/symbol-news.svg' ?>" alt=""> News</h3>
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
				<div class="section">
					<h3><img src="<?= get_template_directory_uri().'/images/symbol-contact.svg' ?>" alt=""> Contact</h3>
					<p>Teresa DeFlitch<br>
					Director, City as Our Campus<br>
					555 Morewood Avenue<br>
					Pittsburgh, PA 15221<br>
					<i class="fa fa-phone"></i> 412-224-4624<br>
					<i class="fa fa-envelope"></i> deflitcht@winchesterthurston.org</p>
				</div>
			</div>
		</div>
	</footer>