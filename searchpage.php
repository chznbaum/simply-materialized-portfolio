<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<main>

  <div class="container">
    <div class="row">
      <div class="col s12">
        <h1>Search <?php bloginfo( 'name' ) ?></h1>
      </div>
    </div>
    <div class="row">
      <?php get_search_form(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>