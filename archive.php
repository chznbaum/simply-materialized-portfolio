<?php get_header(); ?>

<main>
  <div class="section container">
    <div class="row">
      <?php if ( is_post_type_archive() ) : ?>
        <h1><?php post_type_archive_title( __( 'Archives: ', 'simply-materialized-portfolio' ) ); ?></h1>
      <?php else : ?>
        <h1>Archives:</h1>
      <?php endif; ?>
    </div>
    <?php
    $counter = 0;
    $archive = $wp_query;
    if ( $archive->have_posts() ) : while ( $archive->have_posts() ) : $archive->the_post(); $counter++; ?>
      <div class="row">
        <div class="col s12">
          <div id="post-<?php the_ID(); ?>" <?php post_class('browser-default card small horizontal'); ?>>
            <?php if( $counter % 2 == 0 ) : ?>
              <div class="card-stacked">
                <div class="card-content">
                  <span class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                  <?php if( has_post_thumbnail() ) : ?>
                    <span class="hide-on-med-and-down">
                      <?php the_excerpt(); ?>
                    </span>
                  <?php else : ?>
                    <?php the_excerpt(); ?>
                  <?php endif; ?>
                </div>
                <div class="card-action">
                  <a href="<?php the_permalink(); ?>">Read More</a>
                </div>
              </div>
              <?php if( has_post_thumbnail() ): ?>
                <div class="card-image">
                  <?php the_post_thumbnail( 'full' ); ?>
                </div>
              <?php endif; ?>
            <?php else : ?>
              <?php if( has_post_thumbnail() ): ?>
                <div class="card-image">
                  <?php the_post_thumbnail( 'full' ); ?>
                </div>
              <?php endif; ?>
              <div class="card-stacked">
                <div class="card-content">
                  <span class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                  <?php if( has_post_thumbnail() ) : ?>
                    <span class="hide-on-med-and-down">
                      <?php the_excerpt(); ?>
                    </span>
                  <?php else : ?>
                    <?php the_excerpt(); ?>
                  <?php endif; ?>
                </div>
                <div class="card-action">
                  <a href="<?php the_permalink(); ?>">Read More</a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; else : ?>

    <div class="row">
      <p class="center-align flow-text"><?php _e( 'There doesn\'t seem to be any posts here.', 'simply-materialized-portfolio' ); ?></p>
    </div>

    <?php endif; ?>
    <div class="row">
      <?php smp_numeric_pagination( $archive ); ?>
    </div>
</main>

<?php get_footer(); ?>