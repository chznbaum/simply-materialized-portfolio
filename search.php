<?php get_header(); ?>

<main>

  <div class="container">
    <div class="row">
      <div class="col s12">
        <h1>Search Results</h1>
      </div>
    </div>
    <div class="row">
      <?php
        global $query_string;

        $query_args = explode("&", $query_string);
        $search_query = array();

        if( strlen($query_string) > 0 ) {
	        foreach($query_args as $key => $string) {
		        $query_split = explode("=", $string);
		        $search_query[$query_split[0]] = urldecode($query_split[1]);
	        } // foreach
        } //if

        $search = new WP_Query($search_query);
        $total_results = $search->found_posts;
      ?>
      <h2><?php echo $total_results; ?> Results For: <?php echo esc_html( urldecode($query_split[1]) ); ?></h2>
      <?php
        $counter = 0;
        if ( $search->have_posts() ) : while ( $search->have_posts() ) : $search->the_post(); $counter++;
      ?>
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
      <?php endwhile; endif; ?>
    </div>
    <div class="row">
      <?php smp_numeric_pagination( $search ); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>