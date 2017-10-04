<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>
  <div class="container">
    <div class="row">
      <?php
      $query1 = new WP_Query( array( 'post_type' => 'page', 'name' => 'portfolio' ) ); ?>
      <?php if ( $query1->have_posts() ) : while ( $query1->have_posts() ) : $query1->the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php /* Restore original Post Data */
      wp_reset_postdata();
      endwhile; else : ?>
        <h1><?php _e( 'Nothing to See Here', 'simply-materialized-portfolio' ); ?></h1>
        <p><?php _e( 'There doesn\'t seem to be any portfolio items here.', 'simply-materialized-portfolio' ); ?></p>
      <?php endif; ?>
    </div>

    <?php get_template_part( 'content', 'portfolio' ); ?>
  </div>

<?php get_footer(); ?>