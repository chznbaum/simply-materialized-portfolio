<?php
/*
Template Name: Sidebar (Page)
*/
?>
<!-- Secondary Column -->
  <div class="widget">
    <?php if( !dynamic_sidebar( 'page' )): ?>
      <h3 class="header">Sidebar Setup</h3>
      <p>Please add widgets via the admin area.</p>
    <?php endif; ?>
  </div>