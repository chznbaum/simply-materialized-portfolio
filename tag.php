<?php get_header(); ?>

<main>
  <?php if( has_post_thumbnail() ): ?>

  <div class="parallax-container">
    <div class="parallax">
      <?php the_post_thumbnail( 'full' ); ?>
    </div>
  </div>

  <?php endif; ?>
  <div class="section container">
    <div class="row">
      <h2><?php single_tag_title( __( 'Popular Posts Tagged: ', 'simply-materialized-portfolio' ) ); ?></h2>
    </div>
    <div class="row">
      <?php
        $current_name = single_tag_title( '', false );
        $current_tag = get_term_by('name', $current_name, 'post_tag' );
        $current_id = $current_tag->term_id;
        $tag_args = array(
          'post_type'=>'post',
          'posts_per_page'=>3,
          'tag__in'=>$current_id,
          'meta_query'=>array(
            'views'=>array(
              'key'=>'smp_post_views_count',
            ),
            'thumbnail'=>array(
              'key'=>'_thumbnail_id',
            ),
          ),
          'orderby'=>'views_clause',
          'order'=>'DESC'
        );
        $popular_tag = new WP_Query( $tag_args );
        if( $popular_tag->have_posts() ) : while ($popular_tag->have_posts()) : $popular_tag->the_post();?>
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
                <strong><?php echo smp_post_views(get_the_ID()); ?></strong>
                <p><?php the_excerpt(); ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; endif;
        wp_reset_postdata();
      ?>
    </div>
  </div>
  <div class="section container">
    <div class="row">
      <h2><?php single_tag_title( __( 'Other Posts Tagged: ', 'simply-materialized-portfolio' ) ); ?></h2>
    </div>
    <?php
    $counter = 0;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'post_type'=>'post',
      'posts_per_page'=>20,
      'tag__in'=>$current_id,
      'orderby'=>'publish_date',
      'order'=>'DESC',
      'paged'=>$paged,
    );
    $tag = new WP_Query( $args );
    if ( $tag->have_posts() ) : while ( $tag->have_posts() ) : $tag->the_post(); $counter++; ?>
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
      <?php smp_numeric_pagination( $tag ); ?>
    </div>
</main>

<?php get_footer(); ?>