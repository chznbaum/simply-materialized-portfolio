<?php
/*
Template Name: Blog Posts Content Section
*/
?>
<div class="row">
  <?php
  $num_posts = ( is_front_page() ) ? 6 : -1;
  $args = array(
    'post_type' => 'post',
    'meta_key' => '_thumbnail_id',
    'posts_per_page' => $num_posts,
  );
  $query2 = new WP_Query( $args ); ?>

  <?php if ( $query2->have_posts() ) : while ( $query2->have_posts() ) : $query2->the_post();
    if(has_post_thumbnail()): ?>
      <div class="col s12 m12 l4">
        <div class="card medium sticky-action">
          <div class="card-image waves-effect waves-block waves-light">
            <?php the_post_thumbnail('large', ['class' => 'activator']); ?>
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4"><?php the_title(); ?><i class="material-icons right">more_vert</i></span>
          </div>
          <div class="card-action">
            <a href="<?php the_permalink(); ?>">Read More</a>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><?php the_title(); ?><i class="material-icons right">close</i></span>
            <p><?php the_excerpt(); ?></p>
          </div>
        </div>
      </div>
    <?php endif;
  /* Restore original Post Data */
  wp_reset_postdata();
  endwhile; else : ?>
      
    <p><?php _e( 'There doesn\'t seem to be any blog posts here.', 'simply-materialized-portfolio' ); ?></p>
      
  <?php endif; ?>
</div>