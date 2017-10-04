<?php
/**
 * Default Search Form
 */
?>
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-field">
    <input type="search" placeholder="<?php echo esc_attr( 'Search…', 'simply-materialized-portfolio' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" required>
    <label class="label-icon" for="s">
      <i class="material-icons">search</i>
    </label>
    <i class="material-icons">close</i>
    <input class="screen-reader-text" type="submit" id="search-submit" value="Search" />
  </div>
</form>