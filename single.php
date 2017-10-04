<?php get_header(); ?>

<main>

    <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php smp_set_post_views( get_the_ID() ); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="section">
    <div class="row container">
      <?php
        $get_description = get_post( get_post_thumbnail_id() )->post_excerpt;
        if( ( has_post_thumbnail() ) and ( !empty($get_description) ) ){
          echo '<div class="featured-caption">' . $get_description . '</div></div><div class="row">';
        }
        ?>
        </div>
        <div class="row">
      <div class="col s12 m10 offset-m1 l6 push-l4">
        <h2><?php the_title(); ?></h2>
      
        <div class="chip">
          <?php echo get_avatar( get_the_author_meta( 'ID' ), 36 ); ?>
            <?php the_author_posts_link(); ?>
        </div>

        <div class="chip">
          <?php the_time( 'F j, Y' ); ?>
        </div>

        <div class="chip">
          <?php the_category( '</div><div class="chip">' ); ?>
        </div>

        <?php the_tags('<div class="chip">', '</div><div class="chip">', '</div>'); ?>

        <span class="flow-text browser-default"><?php the_content(); ?></span>
        <?php wp_link_pages( array(
	        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'simply-materialized-portfolio' ) . '</span>',
	        'after'       => '</div>',
	        'link_before' => '<span>',
	        'link_after'  => '</span>',
	        ) );
        ?>
        <div class="previous-next">
            <?php previous_post_link( '%link', '<i class="material-icons">chevron_left</i>  %title' ); ?>
            <a href="<?php bloginfo(url);?>/blog">Back to Blog</a>
            <?php next_post_link( '%link', '%title  <i class="material-icons">chevron_right</i>' ); ?>
        </div>
        <?php comments_template(); ?>
      </div>
      <div class="col s12 m12 l4 pull-l6">
        <?php get_sidebar( 'blog' ); ?>
      </div>
      <div class="col l2 hide-on-med-and-down">
        <?php
          $content = get_the_content();
          smp_headings_list($content);
        ?>
      </div>
    </div>
  </div>
  </div>
    <?php endwhile; else : ?>

      <div class="section">
        <div class="row">
        <h1 class="center-align"><?php _e( 'Nothing to See Here', 'simply-materialized-portfolio' ); ?></h1>
        <p class="center-align flow-text"><?php _e( 'There doesn\'t seem to be any posts here.', 'simply-materialized-portfolio' ); ?></p>
        </div>
      </div>

    <?php endif; ?>
</main>

<?php get_footer(); ?>