<?// A list of all page tags. ?>
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
        echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all pages tagged %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li> ';
        }
      }
      wp_reset_postdata();
    ?>
  </ul>
</div>