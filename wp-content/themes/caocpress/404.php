<?php
/**
 * The template for displaying 404 pages (Not Found)
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
      <article>
        <div class="content">
          <header>
            <h2 class="subheading">Page Not Found</h2>
          </header>
          <p>Uh-oh! How did we get here?</p>
          <p>Click <a href="/">here</a> to go back home.</p>
        </div>
      </article>
    </div>
  </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
