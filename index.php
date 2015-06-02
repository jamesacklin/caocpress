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
 * @package   WordPress
 * @subpackage  Starkers
 * @since     Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="main">
  <div class="container-fluid">
    <div class="row">
      <article>
        <div class="col-xs-12">
          <ul class="breadcrumbs"><li><a href="/">Home</a></li><li><strong> Blog</strong></li></ul>
        </div>
        <?
			$page_id = get_option('page_for_posts');
			if (has_post_thumbnail($page_id)){
				echo "<div class='crop'>";
				echo get_the_post_thumbnail($page_id);
				echo "</div>";
			}
        ?>
        <div class="content">
          <h2 class="subheading">Blog</h2>
          <?php
            if ( 'page' == get_option('show_on_front') && get_option('page_for_posts') && is_home() ) : the_post();
              $page_for_posts_id = get_option('page_for_posts');
              setup_postdata(get_page($page_for_posts_id));
              the_content();
              rewind_posts();
            endif;
          ?>
          <?php if ( have_posts() ): ?>
            <div class="article-list">
			  <?php while ( have_posts() ) : the_post(); ?>
				<article>
                <div class="content">
                  <h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                  <p><? the_excerpt(); ?></p>
                  <p class="meta"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time></p>
                </div>
              </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            </div>
          <?php else: ?>
            <article>
              <div class="content">
                <h2>No posts to display</h2>
              </div>
            </article>
          <?php endif; ?>
        </div>
      </article>

      <aside>
        <div class="related">
          <?php Starkers_Utilities::get_template_parts(array('parts/tags-posts')); ?>
        </div>
        <div class="section">
          <?php Starkers_Utilities::get_template_parts(array('parts/share-article')); ?>
        </div>
      </aside>

    </div>
  </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
