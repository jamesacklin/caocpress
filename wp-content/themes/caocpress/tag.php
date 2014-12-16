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
          <? the_post_thumbnail('full'); ?>
          <div class="content">
            <div class="header">
              <h2 class="subheading"><?php echo single_tag_title( '', false ); ?></h2>
            </div>
            <? echo tag_description(); ?>
            <div class="related-pages">
              <div class="category-navigation">
                <?php while ( have_posts() ) : the_post(); ?>
                  <div class="section-link">
                    <h4><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h4>
                    <? if ( has_post_thumbnail() ){
                        echo "<p>";
                        the_post_thumbnail('full');
                        echo "</p>";
                    } ?>
                    <? the_excerpt(); ?>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
          <footer>
            <?php Starkers_Utilities::get_template_parts( array( 'parts/share-article' ) ); ?>
          </footer>
        </article>
      <?php else: ?>
        <article>
          <h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
        </article>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
