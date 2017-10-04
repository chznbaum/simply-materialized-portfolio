<?php get_header(); ?>

<main>
    <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="section">
    <div class="row">
      <div class="col s12 m10 offset-m1 l8 offset-l2">
        <div class="row">
          <div><?php the_content(); ?></div>
        </div>
      <?php endwhile; endif ; ?>
        <div class="row">
          <h2>Recent Work</h2>
        </div>
        <?php get_template_part( 'content', 'portfolio' ); ?>
        <div class="row">
          <h2>Recent Posts</h2>
        </div>
        <?php get_template_part( 'content', 'posts' ); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>