<?php
  /**
   * Starkers functions and definitions
   *
   * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
   *
   * @package   WordPress
   * @subpackage  Starkers
   * @since     Starkers 4.0
   */

  /* ========================================================================================================================

  Required external files

  ======================================================================================================================== */

  require_once( 'external/starkers-utilities.php' );

  /* ========================================================================================================================

  Theme specific settings

  Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

  ======================================================================================================================== */

  add_theme_support('post-thumbnails');

  register_nav_menus(array('primary' => 'Main Navigation'));

  /* ========================================================================================================================

  Actions and Filters

  ======================================================================================================================== */

  add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

  add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

  /* ========================================================================================================================

  Custom Post Types - include custom post types and taxonimies here e.g.

  e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

  ======================================================================================================================== */



  /* ========================================================================================================================

  Scripts

  ======================================================================================================================== */

  /**
   * Add scripts via wp_head()
   *
   * @return void
   * @author Keir Whitaker
   */

  function starkers_script_enqueuer() {

    wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
  }

  /* ========================================================================================================================

  Comments

  ======================================================================================================================== */

  /**
   * Custom callback for outputting comments
   *
   * @return void
   * @author Keir Whitaker
   */
  function starkers_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <?php if ( $comment->comment_approved == '1' ): ?>
    <li>
      <article id="comment-<?php comment_ID() ?>">
        <?php echo get_avatar( $comment ); ?>
        <h4><?php comment_author_link() ?></h4>
        <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
        <?php comment_text() ?>
      </article>
    <?php endif;
  }


add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

add_filter( 'wp_trim_excerpt', 'my_custom_excerpt', 10, 2 );

function my_custom_excerpt($text, $raw_excerpt) {
    if( ! $raw_excerpt ) {
        $content = apply_filters( 'the_content', get_the_content() );
        $text = substr( $content, 0, strpos( $content, '</p>' ) + 4 );
    }
    return $text;
}

function the_breadcrumb() {
    global $post;
    echo '<ul class="breadcrumbs">';
    if (is_page()) {
      if($post->post_parent){
        $anc = get_post_ancestors( $post->ID );
        $title = get_the_title();
        foreach ( $anc as $ancestor ) {
          $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
        }
        echo $output;
        echo '<li><strong title="'.$title.'"> '.$title.'</strong></li>';
      } else {
          echo '<li><a href="/">Home</a></li>';
          echo '<li><strong> '.get_the_title().'</strong></li>';
      }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

  register_sidebar( array(
    'name' => 'Global Footer',
    'id' => 'global-footer',
    'before_widget' => '<div class="section">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/* =Clean up the WordPress head
------------------------------------------------- */

    // remove header links
    add_action('init', 'tjnz_head_cleanup');
    function tjnz_head_cleanup() {
        remove_action( 'wp_head', 'feed_links_extra', 3 );                      // Category Feeds
        remove_action( 'wp_head', 'feed_links', 2 );                            // Post and Comment Feeds
        remove_action( 'wp_head', 'rsd_link' );                                 // EditURI link
        remove_action( 'wp_head', 'wlwmanifest_link' );                         // Windows Live Writer
        remove_action( 'wp_head', 'index_rel_link' );                           // index link
        remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );              // previous link
        remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );               // start link
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // Links for Adjacent Posts
        remove_action( 'wp_head', 'wp_generator' );                             // WP version
        if (!is_admin()) {
            wp_deregister_script('jquery');                                     // De-Register jQuery
            wp_register_script('jquery', '', '', '', true);                     // Register as 'empty', because we manually insert our script in header.php
        }
    }

    // remove WP version from RSS
    add_filter('the_generator', 'tjnz_rss_version');
    function tjnz_rss_version() { return ''; }