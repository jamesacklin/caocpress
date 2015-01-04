<?php
/**
 * The template used to display Tag Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="main">
  <div class="container-fluid">
    <div class="row">
      <?php if ( have_posts() ): ?>
        <article>
          <?php if(has_post_thumbnail()): ?>
            <div class="crop">
              <? the_post_thumbnail('full'); ?>
            </div>
          <?php endif; ?>
          <div class="content">
            <div class="header">
              <h2 class="subheading">Tagged: <?php echo single_tag_title( '', false ); ?></h2>
            </div>
            <div class="related-pages" style="margin-top: 0;">
              <div class="category-navigation">
                <?php while ( have_posts() ) : the_post(); ?>
                  <div class="section-link">
                    <? if ( has_post_thumbnail()): ?>
                        <div class="image">
                          <a href="<? the_permalink(); ?>"><? the_post_thumbnail('full'); ?></a>
                        </div>
                    <? endif; ?>
                    <h4><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h4>
                    <? the_excerpt(); ?>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
          <footer>
          </footer>
        </article>
      <?php else: ?>
        <article>
          <h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
        </article>
      <?php endif; ?>
      <aside>
        <?php Starkers_Utilities::get_template_parts(array('parts/tags-pages')); ?>
        <?php Starkers_Utilities::get_template_parts(array('parts/tags-posts')); ?>
        <div class="section">
          <?php Starkers_Utilities::get_template_parts( array( 'parts/share-article' ) ); ?>
        </div>
      </aside>
    </div>
  </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
