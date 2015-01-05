<?php
/**
 * The Template for displaying all single posts
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
        <? if(has_post_thumbnail()): ?>
          <div class="crop">
            <? the_post_thumbnail('large') ?>
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
        </footer>
      </article>
      <aside>
        <div class="related">
          <? // Content areas (from custom fields) ?>
          <?php if(get_field('content_areas')): ?>
            <?php while(has_sub_field('content_areas')) :?>
              <div class="section">
                  <h4 class="subheading"><?php the_sub_field('header') ?></h4>
                  <?php the_sub_field('content'); ?>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <? // Tag list ?>
          <?php the_tags('<div class="section"><h4 class="subheading">Tags</h4><ul class="tag-list"><li>','</li><li>','</li></ul></div>'); ?>
        </div>
        <?php Starkers_Utilities::get_template_parts(array('parts/tags-posts')); ?>
        <div class="section">
          <?php Starkers_Utilities::get_template_parts( array( 'parts/share-article' ) ); ?>
        </div>
      </aside>
    </div>
  </div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
