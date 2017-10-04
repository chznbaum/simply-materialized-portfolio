    <footer class="page-footer">
      <div class="container">
        <?php smp_social_icons_output(); ?>
        <div class="row">
          <div class="col l4 s12">
            <?php if( has_custom_logo() ) : ?>
              <div class="row" id="footerBranding">
                <?php the_custom_logo(); ?>
              </div>
            <?php else: ?>
              <h5>About <?php bloginfo( 'name' ); ?></h5>
            <?php endif; ?>
            <p><?php bloginfo( 'description' ); ?></p>
          </div>
          <div class="col l4 s12"><?php get_sidebar( 'footer' ); ?></div>
          <div class="col l4 s12">
            <?php

              $defaults = array(
                'container' => false,
                'theme_location' => 'secondary-menu',
                'walker' => new smp_Footer_Walker()
              );

              wp_nav_menu( $defaults );

            ?>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <?php echo __( 'Copyright &copy; ', 'simply-materialized-portfolio' ); echo date('Y') . ' '; echo smp_copyright_output(); ?>
        </div>
      </div>
    </footer>
    <?php get_template_part( 'content', 'fab' ); ?>
    <?php wp_footer(); ?>
  </body>
</html>