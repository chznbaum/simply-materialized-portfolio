<?php
/*
Template Name: Single Portfolio
*/
?>
<?php get_header(); ?>

<main>

    <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php if( has_post_thumbnail() ): ?>

      <?php endif; ?>

  <div class="section">
    <div class="row">
      <?php
        $get_description = get_post( get_post_thumbnail_id() )->post_excerpt;
        if( ( has_post_thumbnail() ) and ( !empty($get_description) ) ){
          echo '<div class="container"><div class="featured-caption">' . $get_description . '</div></div></div><div class="row">';
        }
        ?>
      <div class="col s12 m4 offset-m1">
        <div class="row">
        <h2><?php the_title(); ?></h2>
        </div>
        <div class="row">
        <div class="chip">
          <?php echo get_avatar( get_the_author_meta( 'ID' ), 36 ); ?>
          <?php the_author_posts_link(); ?>
        </div>

        <div>
          <?php the_terms($post->ID, 'technologies', '<div class="chip">', '</div><div class="chip">', '</div>'); ?>
        </div>
        </div>

        <div class="row">
          <?php
            $portfolio_description_values = get_post_custom_values( 'portfolio-meta-box-description');
            foreach( $portfolio_description_values as $key => $value ) {
              echo do_shortcode( $value );
            }
          ?>
        </div>

        <div class="row">
          <?php
            $portfolio_source_values = get_post_custom_values( 'portfolio-meta-box-source' );
            if( $portfolio_source_values[0] != '' ) {
              foreach( $portfolio_source_values as $key => $value ) {
              ?>
                <a href="<?php echo esc_url($value); ?>" class="btn waves-effect waves-light">View Source</a>
              <?php
            }
            }
          ?>
        </div>
        <div class="row">
          <?php
            $portfolio_live_values = get_post_custom_values( 'portfolio-meta-box-live' );
            if( $portfolio_live_values[0] != '' ) {
              foreach( $portfolio_live_values as $key => $value ) {
              ?>
                <a href="<?php echo esc_url($value); ?>" class="btn waves-effect waves-light">View Live</a>
              <?php
              }
            }
          ?>
        </div>

        <div class="row">
          <p>
            <?php previous_post_link('%link', '<i class="material-icons">chevron_left</i>'); ?>
            <a href="<?php bloginfo(url);?>/portfolio">Back to Portfolio</a>
            <?php next_post_link('%link', '<i class="material-icons">chevron_right</i>'); ?>
          </p>
        </div>
      </div>
      <div class="col s12 m6">

        <div>
          <?php
            $portfolio_image_values = get_post_custom_values( 'portfolio-meta-box-images');
            foreach( $portfolio_image_values as $key => $value ) {
            echo do_shortcode( $value );
            }
          ?>
        </div>
      </div>
    </div>

      <?php endwhile; else : ?>

    <div class="row container">
      <div class="col s12"

        <h1 class="center-align"><?php _e( 'Nothing to See Here', 'simply-materialized-portfolio' ); ?></h1>
        <p class="center-align flow-text"><?php _e( 'There doesn\'t seem to be any posts here.', 'simply-materialized-portfolio' ); ?></p>

      </div>
    </div>

      <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>