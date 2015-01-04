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
 * @package   WordPress
 * @subpackage  Starkers
 * @since     Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="main">
  <div class="container-fluid">
    <div class="row">
      <article>
        <div class="col-xs-12"><?php the_breadcrumb(); ?></div>
        <? if(has_post_thumbnail()): ?>
          <div class="crop">
            <? the_post_thumbnail('full') ?>
          </div>
        <? endif; ?>
        <div class="content">
          <header>
            <h2 class="subheading"><?php the_title(); ?></h2>
          </header>
          <?php the_content(); ?>
          <?// Go get the sub-page group repeater ?>
          <?php if(have_rows('sub_page_group')): ?>
            <?// Loop over the sub-page groups in the larger set ?>
            <?php while(have_rows('sub_page_group')): the_row(); ?>
              <div class="related-pages">
                <h3><?php the_sub_field('sub_page_group_name'); ?></h3>
                <div class="category-navigation">
                  <?// Now get all the pages we want in each sub-group ?>
                  <?php while(have_rows('sub_page_contents')): the_row(); ?>
                    <?// Loop over all the related pages chosen ?>
                    <div class="section-link">
                      <?php $post = get_sub_field('sub_page'); setup_postdata($post); ?>
                      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <?// Show post thumbnail, if present ?>
                      <? if ( has_post_thumbnail() ){
                        echo "<div class='image'>";
                        echo "<a href='";
                        the_permalink();
                        echo "''>";
                        the_post_thumbnail('full');
                        echo "</a></div>";
                      }?>
                      <? the_excerpt(); ?>
                      <?// Reset postdata so everything else works ?>
                      <?php wp_reset_postdata();?>
                    </div>
                <?php endwhile; // while(have_rows('sub_page_contents')): the_row(); ?>
                </div>
              </div>
            <?php endwhile; // while(have_rows('sub_page_group')): the_row(); ?>
          <?php endif; // if(have_rows('sub_page_group')): ?>
        </div>
        <footer>
        </footer>
      </article>
      <aside>
        <? if(is_page(42)): ?>
          <?// A list of all page tags, but only on the portfolio page. ?>
          <div class="section">
            <h4 class="subheading">Experience Tags</h4>
            <ul class="tag-list">
              <?php
                // WOOOOOOF. Query all posts for a post type, get the tags,
                // then spit out a list of tags for all posts in a given
                // post type. This works here for all pages. Please don't
                // tag anything other than student project pages as anything,
                // or else it will show up here.
                $custom_query = new WP_Query('post_type=page');
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
        <?php endif; ?>
        <? // Gets content areas
          if(get_field('content_areas')): ?>
          <?php while(has_sub_field('content_areas')) :?>
            <div class="section">
                <h4 class="subheading"><?php the_sub_field('header') ?></h4>
                <?php the_sub_field('content'); ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php Starkers_Utilities::get_template_parts( array( 'parts/share-article' ) ); ?>
      </aside>
    </div>
  </div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
