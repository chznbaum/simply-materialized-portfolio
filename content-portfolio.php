<?php
/*
Template Name: Portfolio Content Section
*/
?>
<div class="row">
  <div class="masonry-cards">
  <?php
  $num_posts = ( is_front_page() ) ? 6 : -1;
  $args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => $num_posts
    );
  $query2 = new WP_Query( $args ); ?>

  <?php if ( $query2->have_posts() ) : while ( $query2->have_posts() ) : $query2->the_post(); ?>
    <div class="col s12 m12 l4">
      <div class="card small">
        <div class="card-image portfolio-card-image" style="height: 100%;">
          <?php the_post_thumbnail('large'); ?>
          <span class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
        </div>
      </div>
    </div>
  <?php /* Restore original Post Data */
  wp_reset_postdata();
  endwhile; else : ?>
      
    <h1><?php _e( 'Nothing to See Here', 'simply-materialized-portfolio' ); ?></h1>
    <p><?php _e( 'There doesn\'t seem to be any portfolio items here.', 'simply-materialized-portfolio' ); ?></p>
      
  <?php endif; ?>
  </div>
</div>