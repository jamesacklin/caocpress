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
            <? the_post_thumbnail('large') ?>
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
                <h3 class="subheading"><?php the_sub_field('sub_page_group_name'); ?></h3>
                <div class="category-navigation">
                  <?// Now get all the pages we want in each sub-group ?>
                  <?php while(have_rows('sub_page_contents')): the_row(); ?>
                    <?// Loop over all the related pages chosen ?>
                    <div class="section-link">
                      <?php $post = get_sub_field('sub_page'); setup_postdata($post); ?>
                      <?// Show post thumbnail, if present ?>
                      <? if ( has_post_thumbnail() ){
                        echo "<div class='image'>";
                        echo "<a href='";
                        the_permalink();
                        echo "''>";
                        the_post_thumbnail('full');
                        echo "</a></div>";
                      }?>
                      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
        <div class="related">
          <? // Gets content areas
            if(get_field('content_areas')): ?>
            <?php while(has_sub_field('content_areas')) :?>
              <div class="section">
                  <h4 class="subheading"><?php the_sub_field('header') ?></h4>
                  <?php the_sub_field('content'); ?>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <? if(is_page(42)): ?>
          <?php Starkers_Utilities::get_template_parts(array('parts/tags-pages')); ?>
        <?php endif; ?>
        <div class="section">
          <?php Starkers_Utilities::get_template_parts( array( 'parts/share-article' ) ); ?>
        </div>
      </aside>
    </div>
  </div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
