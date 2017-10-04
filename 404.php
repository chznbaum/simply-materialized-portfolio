<?php get_header(); ?>

<main>
  <div class="section container">
    <div class="row">
      <h1>You Still Haven't Found What You're Looking For</h1>
      <p class="flow-text">We can't always get what we want. Sorry you didn't find it the first time.</p>
      <p class="flow-text">But who knows. If you try, sometimes you might find you get what you need. Try searching for it here, or <a href="<?php echo esc_url( home_url() ); ?>">just go home</a>. Or you can take a look below to see what grabs you.</p>
    </div>
    <div class="row">
      <?php get_search_form(); ?>
    </div>
    <div class="row">
      <h2>Here's What's Popular Around Here</h2>
    </div>
    <div class="row">
      <?php
        $notfound_args = array(
          'post_type'=>'post',
          'posts_per_page'=>3,
          'ignore_sticky_posts'=>1,
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
        $popular_notfound = new WP_Query( $notfound_args );
        if( $popular_notfound->have_posts() ) : while ( $popular_notfound->have_posts() ) : $popular_notfound->the_post();?>
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
      <h2>Other Posts to Check Out</h2>
    </div>
    <?php
    $counter = 0;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'post_type'=>'post',
      'posts_per_page'=>20,
      'orderby'=>'publish_date',
      'order'=>'DESC',
      'paged'=>$paged,
    );
    $notfound = new WP_Query( $args );
    if ( $notfound->have_posts() ) : while ( $notfound->have_posts() ) : $notfound->the_post(); $counter++; ?>
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
      <?php smp_numeric_pagination( $notfound ); ?>
    </div>
</main>

<?php get_footer(); ?>