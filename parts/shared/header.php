  <header role="banner">
    <div class="container-fluid">
      <ul id="primary-nav" class="nav" role="navigation">
        <li class="home-link">
          <a href="<?php echo home_url(); ?>" class="logo">
            <?php if(is_front_page()) {
              include(get_template_directory() . '/images/logo-wt.svg');
            } else {
              include(get_template_directory() . '/images/logo-combined.svg');
            } ?>
          </a>
        </li>
        <?php
          $menuargs = array(
            'menu' => '6',
            'container' => false,
            'items_wrap' => '%3$s',
          );
          wp_nav_menu( $menuargs );
        ?>
      </ul>
    </div>
  </header>
