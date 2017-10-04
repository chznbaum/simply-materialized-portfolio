<?php
/*
Template Name: Slurp Header
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <nav>
        <div class="nav-wrapper">
            <?php if( has_custom_logo() ) : ?>
              <?php the_custom_logo(); ?>
            <?php else : ?>
              <a href="<?php echo esc_url( home_url() ); ?>" class="brand-logo">
                <?php bloginfo( 'name' ); ?>
              </a>
            <?php endif; ?>
          <a href="#" data-activates="header-nav" class="button-collapse right">
            <i class="material-icons">menu</i>
          </a>
          <?php

          $defaults = array(
            'container' => false,
            'theme_location' => 'primary-menu',
            'menu_class' => 'right hide-on-med-and-down',
            'walker' => new wp_materialize_navwalker()
          );
          wp_nav_menu( $defaults );

        ?>
        <?php

          $defaults = array(
            'container' => false,
            'theme_location' => 'primary-menu',
            'menu_class' => 'side-nav',
            'menu_id' => 'header-nav'
          );

          wp_nav_menu( $defaults );

        ?>
        </div>
      </nav>
      <div class="parallax-container">
        <div class="parallax">
          <img src="<?php header_image(); ?>" alt="">
        </div>
      </div>
    </header>