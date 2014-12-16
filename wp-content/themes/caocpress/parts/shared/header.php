  <header role="banner">
    <div class="container-fluid">
      <ul id="primary-nav" class="nav" role="navigation">
        <li><a href="<?php echo home_url(); ?>" class="logo">
          <img src="<?= get_template_directory_uri().'/images/logo-combined.svg' ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
        </li>
        <?php
          $menuargs = array(
            'menu' => '1',
            'container' => false,
            'items_wrap' => '%3$s',
          );
          wp_nav_menu( $menuargs );
        ?>

      </ul>
    </div>
  </header>
