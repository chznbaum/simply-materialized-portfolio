<?php
/*
Template Name: Page With Right Sidebar
*/
?>
<?php get_header(); ?>

<main>

    <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php if( has_post_thumbnail() ): ?>

      <?php endif; ?>

  <div class="section">
    <div class="row container">
      <?php
        $get_description = get_post( get_post_thumbnail_id() )->post_excerpt;
        if( ( has_post_thumbnail() ) and ( !empty($get_description) ) ){
          echo '<div class="featured-caption">' . $get_description . '</div></div><div class="row container">';
        }
        ?>
    </div>
    <div class="row">
      <div class="col s12 m6 offset-m1">

        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_content(); ?>

    <?php endwhile; else : ?>

      <h1><?php _e( 'Nothing to See Here', 'simply-materialized-portfolio' ); ?></h1>
      <p><?php _e( 'There doesn\'t seem to be any posts here.', 'simply-materialized-portfolio' ); ?></p>

    <?php endif; ?>
      </div>
      <div class="col s12 m3 offset-m1">
        <?php get_sidebar( 'page' ); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>