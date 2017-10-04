<?php get_header(); ?>

<main>
    <?php $home_query = $wp_query; ?>
    <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php if( has_post_thumbnail() ): ?>
      
  <div class="parallax-container">
    <div class="parallax">
      <?php the_post_thumbnail( 'full' ); ?>
    </div>
  </div>

      <?php endif; ?>

  <div id="post-<?php the_ID(); ?>" <?php post_class( 'section' ); ?>>
    <div class="row container">

      <?php
        $get_description = get_post( get_post_thumbnail_id() )->post_excerpt;
        if( ( has_post_thumbnail() ) and ( !empty($get_description) ) ){
          echo '<div class="featured-caption">' . $get_description . '</div></div><div class="row container">';
        }
        ?>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">

      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p class="flow-text">Posted <a href="<?php the_permalink(); ?>"><?php the_time( 'F j, Y' ); ?></a> in <?php the_category( ', ' ); ?></p>

      <div class="chip">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 36 ); ?>
          <?php the_author_posts_link(); ?>
      </div>

      <?php the_tags('<div class="chip">', '</div><div class="chip">', '</div>'); ?>

      <span class="flow-text"><?php the_excerpt(); ?></span>

      <a href="<?php the_permalink(); ?>" class="waves-effect waves-light btn">Continue Reading</a>
      </div>
    </div>
  </div>

    <?php endwhile; else : ?>

      <div class="section">
        <div class="row">
          <div class="col s12 m10 offset-m1 l8 offset-l2">
          <h2><?php _e( 'Nothing to See Here', 'simply-materialized-portfolio' ); ?></h1>
          <p class="flow-text"><?php _e( 'There doesn\'t seem to be any posts here.', 'simply-materialized-portfolio' ); ?></p>
          </div>
        </div>
      </div>

    <?php endif; ?>
      <div class="section">
        <div class="row">
          <div class="col s12 m10 offset-m1 l8 offset-l2">
            <?php smp_numeric_pagination( $home_query ); ?>
          </div>
        </div>
      </div>
</main>

<?php get_footer(); ?>