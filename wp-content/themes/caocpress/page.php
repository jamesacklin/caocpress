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
        <? the_post_thumbnail('full'); ?>
        <div class="content">
          <header>
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
        <? // Gets sibling pages
        global $post;
        $post_parent = $post->ID;
        $post_parent = $post->post_parent;
        $args = array(
            'posts_per_page' => -1,
            'post_parent' =>$post_parent,
            'post_type'=> 'page',
            'exclude' => '7, '.$post->ID,
        );
        $siblings = get_posts( $args );
        if ($siblings): ?>
            <div class="section navigation">
            <h4 class="subheading" style="color: #5b4472">More in this section</h4>
            <? foreach ( $siblings as $post ) : setup_postdata( $post ); ?>
                <div class="section-link">
                    <h5><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h5>
                    <? if ( has_post_thumbnail() ){
                        echo "<p>";
                        the_post_thumbnail('full');
                        echo "</p>";
                    } ?>
                    <? the_excerpt(); ?>
                    <hr />
                </div>
            <?php endforeach;
            echo '</div>';
        endif;
        wp_reset_postdata(); ?>
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
