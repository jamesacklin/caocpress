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

      <aside>
        <?// A list of all post tags. ?>
        <div class="section">
          <h4 class="subheading">News Tags</h4>
          <ul class="tag-list">
            <?php
              // WOOOOOOF. Query all posts for a post type, get the tags,
              // then spit out a list of tags for all posts in a given
              // post type. This works here for all "posts," and is used elsewhere
              // for pages (e.g., portfolio).
              $custom_query = new WP_Query('post_type=post');
              if ($custom_query->have_posts()) :
                while ($custom_query->have_posts()) : $custom_query->the_post();
                  $posttags = get_the_tags();
                  if ($posttags) {
                    foreach($posttags as $tag) {
                      $all_tags[] = $tag->term_id;
                    }
                  }
                endwhile;
              endif;
              $tags_arr = array_unique($all_tags);
              $tags_str = implode(",", $tags_arr);
              $args = array (
                'include'   => $tags_str
              );
              $tags = get_tags($args);
              if ($tags) {
                foreach ($tags as $tag) {
                echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li> ';
                }
              }
              wp_reset_postdata();
            ?>
          </ul>
        </div>
      </aside>

    </div>
  </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
