<?php
/*
Template Name: Page Slurp Template
*/
?>
<?php get_header( 'slurp' ); ?>

<main>

  <div class="section">
    <div class="row">
      <div class="col s12 m10 offset-m1 l8 offset-l2">

        <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_content(); ?>

        <?php endwhile; else : ?>

          <h1><?php _e( 'Nothing to See Here', 'simply-materialized-portfolio' ); ?></h1>
          <p><?php _e( 'There doesn\'t seem to be any posts here.', 'simply-materialized-portfolio' ); ?></p>

        <?php endif; ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>