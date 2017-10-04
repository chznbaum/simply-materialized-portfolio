<?php
/*
Template Name: Floating Action Button
*/
?>
<div class="fixed-action-btn click-to-toggle">
  <a href="#" class="btn-floating btn-large">
    <i class="large material-icons">menu</i>
  </a>
  <ul>
  <?php if ( ( 'post' == get_post_type($post->ID) ) and (current_user_can('publish_posts') ) ) { ?>
      <li><a href="<?php
      $url = home_url( '/new-post' ); 
      echo esc_url( $url );
      ?>" class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="New Post"><i class="material-icons">add</i></a></li><?php
  } ?>
    <?php  if( is_singular() ) {
      if( current_user_can('edit_posts') ) {
        smp_edit_post_link( '<i class="material-icons">mode_edit</i>', '<li>', '</li>', '', 'btn-floating orange', 'Edit', 'left' );
      }
    } ?>
    <?php if( ( is_singular() ) and (comments_open($post->ID)) ) { ?>
      <li><a href="<?php echo esc_url( get_comments_link($post->ID) ); ?>" class="btn-floating red tooltipped" data-position="left" data-delay="50" data-tooltip="Comment"><i class="material-icons">comment</i></a></li><?php
    }
    ?>
    <li><a href="<?php
      $url = home_url( '/search' ); 
      echo esc_url( $url );
      ?>" class="btn-floating indigo tooltipped" data-position="left" data-delay="50" data-tooltip="Search"><i class="material-icons">search</i></a>
    </li>
    <li><a href="<?php echo esc_url( get_dashboard_url() ); ?>" class="btn-floating grey tooltipped" data-position="left" data-delay="50" data-tooltip="Dashboard"><i class="material-icons">settings</i></a></li>
  </ul>
</div>