<?php

if ( ! isset( $content_width ) )
    $content_width = 2900;

// Support title tags
add_theme_support( 'title-tag' );

// Support feed-links
add_theme_support( 'automatic-feed-links' );

// Support HTML5 Search Forms
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'search-form' ) );

// Support featured images
add_theme_support( 'post-thumbnails' );

add_theme_support( 'custom-background' );

// Support custom logo
function smp_logo_setup() {
  $defaults = array(
    'height' => 80,
    'width' => 200,
    'flex-width' => true,
    'flex-height' => true,
    'header-text' => array ( 'site-title', 'site-description' ),
  );
  add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'smp_logo_setup' );

function smp_custom_logo() {
  if( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
  }
}

// Custom header
function smp_custom_header_setup() {
  $args = array(
    'default-image' => get_template_directory_uri() . '/img/default-header.jpg',
    'default-text-color' => '000',
    'width' => 1920,
    'height' => 1200,
    'flex-height' => true,
    'flex-width' => true,
  );
  add_theme_support( 'custom-header', $args );
}

add_action( 'after_setup_theme', 'smp_custom_header_setup' );

function smp_social_array() {
  $social_sites = array(
    '500px',
    'behance',
    'codepen',
    'delicious',
    'deviantart',
    'digg',
    'dribbble',
    'facebook',
    'flickr',
    'foursquare',
    'free-code-camp',
    'github',
    'google-plus',
    'hacker-news',
    'instagram',
    'linkedin',
    'paypal',
    'pinterest',
    'qq',
    'quora',
    'reddit',
    'rss',
    'slideshare',
    'soundcloud',
    'spotify',
    'steam',
    'stumbleupon',
    'tencent-weibo',
    'twitch',
    'twitter',
    'vimeo',
    'vk',
    'wechat',
    'weibo',
    'xing',
    'yahoo',
  );

  return $social_sites;
}

// Customizer modifications
function smp_customize_register( $wp_customize ) {

  $social_sites = smp_social_array();
  $social_priority = 5;

  // Add custom sections
  $wp_customize->add_section( 'smp_social_media', array(
    'title' => __( 'Social Media', 'simply-materialized-portfolio' ),
    'priority' => 25,
    'description' => __( 'Add the URL for each of the social profiles you wish to include.', 'simply-materialized-portfolio' ),
  ) );

  $wp_customize->add_section( 'smp_copyright_area', array(
    'title' => __( 'Copyright Area', 'simply-materialized-portfolio' ),
    'priority' => 160,
  ) );

  // Add custom settings
  $wp_customize->add_setting( 'smp_primary_color', array(
    'type' => 'theme_mod',
    'default' => '#03a9f4',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  $wp_customize->add_setting( 'smp_accent_color', array(
    'type' => 'theme_mod',
    'default' => '#ff6d00',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  $wp_customize->add_setting( 'smp_copyright_text', array(
    'type' => 'theme_mod',
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add UI Controls
  $wp_customize->add_control( 'smp_primary_color', array(
    'type' => 'color',
    'section' => 'colors',
    'label' => 'Branding Primary Color',
  ) );

  $wp_customize->add_control( 'smp_accent_color', array(
    'type' => 'color',
    'section' => 'colors',
    'label' => 'Branding Accent Color',
  ) );

  $wp_customize->add_control( 'smp_copyright_text', array(
    'type' => 'text',
    'section' => 'smp_copyright_area',
    'label' => 'Copyright Text',
  ) );

  // Social Links
  foreach( $social_sites as $social_site ) {

    if( $social_site == '500px' ) {
      $label = '500px';
    } elseif( $social_site == 'behance' ) {
      $label = 'Behance';
    } elseif( $social_site == 'codepen' ) {
      $label = 'CodePen';
    } elseif( $social_site == 'delicious' ) {
      $label = 'Delicious';
    } elseif( $social_site == 'deviantart' ) {
      $label = 'DeviantArt';
    } elseif( $social_site == 'digg' ) {
      $label = 'Digg';
    } elseif( $social_site == 'dribbble' ) {
      $label = 'Dribbble';
    } elseif( $social_site == 'facebook' ) {
      $label = 'Facebook';
    } elseif( $social_site == 'flickr' ) {
      $label = 'Flickr';
    } elseif( $social_site == 'foursquare' ) {
      $label = 'FourSquare';
    } elseif( $social_site == 'free-code-camp' ) {
      $label = 'freeCodeCamp';
    } elseif( $social_site == 'github' ) {
      $label = 'GitHub';
    } elseif( $social_site == 'google-plus' ) {
      $label = 'Google Plus';
    } elseif( $social_site == 'hacker-news' ) {
      $label = 'Hacker News';
    } elseif( $social_site == 'instagram' ) {
      $label = 'Instagram';
    } elseif( $social_site == 'linkedin' ) {
      $label = 'LinkedIn';
    } elseif( $social_site == 'paypal' ) {
      $label = 'Paypal.me';
    } elseif( $social_site == 'pinterest' ) {
      $label = 'Pinterest';
    } elseif( $social_site == 'qq' ) {
      $label = 'QQ';
    } elseif( $social_site == 'quora' ) {
      $label = 'Quora';
    } elseif( $social_site == 'reddit' ) {
      $label = 'Reddit';
    } elseif( $social_site == 'rss' ) {
      $label = 'RSS';
    } elseif( $social_site == 'slideshare' ) {
      $label = 'SlideShare';
    } elseif( $social_site == 'soundcloud' ) {
      $label = 'SoundCloud';
    } elseif( $social_site == 'spotify' ) {
      $label = 'Spotify';
    } elseif( $social_site == 'steam' ) {
      $label = 'Steam';
    } elseif( $social_site == 'stumbleupon' ) {
      $label = 'StumbleUpon';
    } elseif( $social_site == 'tencent-weibo' ) {
      $label = 'Tencent Weibo';
    } elseif( $social_site == 'twitch' ) {
      $label = 'Twitch.tv';
    } elseif( $social_site == 'twitter' ) {
      $label = 'Twitter';
    } elseif( $social_site == 'vimeo' ) {
      $label = 'Vimeo';
    } elseif( $social_site == 'vk' ) {
      $label = 'VK';
    } elseif( $social_site == 'wechat' ) {
      $label = 'WeChat';
    } elseif( $social_site == 'weibo' ) {
      $label = 'Weibo';
    } elseif( $social_site == 'xing' ) {
      $label = 'Xing';
    } elseif( $social_site == 'yahoo' ) {
      $label = 'Yahoo';
    }

    $wp_customize->add_setting( $social_site, array(
      'type' => 'theme_mod',
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( $social_site, array(
      'type' => 'url',
      'label' => $label,
      'section' => 'smp_social_media',
      'priority' => $social_priority,
    ) );

    $social_priority += 5;
  }

}

add_action( 'customize_register', 'smp_customize_register' );

function smp_copyright_output() {
  $default = get_bloginfo( 'author' ) . '. All Rights Reserved.';
  $copyright_text = get_theme_mod( 'smp_copyright_text' );
  if( ( $copyright_text != '' ) and ( $copyright_text != $default ) ) {
    return $copyright_text;
  } else {
    return $default;
  }
}

function smp_social_icons_output() {
  $social_sites = smp_social_array();

  foreach( $social_sites as $social_site ) {
    if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
      $active_sites[] = $social_site;
    }
  }

  if( !empty( $active_sites ) ) {
    echo '<div class="row"><div class="col s12"><ul class="social-icons flow-text">';

    foreach( $active_sites as $active_site ) {
      ?>
        <li><a href="<?php echo get_theme_mod( $active_site ); ?>">
      <?php if( $active_site == 'vimeo' ) {
        ?>
          <i class="fa fa-<?php echo $active_site; ?>-square"></i>
        <?php
      } else {
        ?>
          <i class="fa fa-<?php echo $active_site; ?>"></i>
        <?php
      } ?>
      </a></li>
      <?php
    }
    echo '</ul></div></div>';
  }
}

function smp_head_styles() {
  $primary_color = get_theme_mod( 'smp_primary_color' );
  $accent_color = get_theme_mod( 'smp_accent_color' );

  if( $primary_color != '#03a9f4' ) :
  ?>
    <style type="text/css">
      blockquote { border-left: 5px solid <?php echo $primary_color; ?>; }
      
      .pagination li.active { background-color: <?php echo $primary_color; ?>; }
      
      .page-footer { background-color: <?php echo $primary_color; ?>; }

      nav { background-color: <?php echo $primary_color; ?>; }

      .tabs .tab a:hover, .tabs .tab a.active { color: <?php echo $primary_color; ?>; }

      .table-of-contents a:hover { border-left: 1px solid <?php echo $primary_color; ?>; }

      .table-of-contents a.active { border-left: 2px solid <?php echo $primary_color; ?>; }

      .side-nav .collapsible-body > ul:not(.collapsible) > li.active, .side-nav.fixed .collapsible-body > ul:not(.collapsible) > li.active { background-color: <?php echo $primary_color; ?>; }

      .tap-target { background-color: <?php echo $primary_color; ?>; }

    </style>
  <?php endif;

  if( $accent_color != '#ff6d00' ) :
  ?>
    <style type="text/css">
      a { color: <?php echo $accent_color; ?>; }

      .collection .collection-item.active { background-color: <?php echo $accent_color; ?>; }

      .collection a.collection-item { color: <?php echo $accent_color; ?>; }

      .secondary-content { color: <?php echo $accent_color; ?>; }

      .progress .determinate { background-color: <?php echo $accent_color; ?>; }
      
      .progress .indeterminate { background-color: <?php echo $accent_color; ?>; }

      span.badge.new { background-color: <?php echo $accent_color; ?>; }

      .card .card-action a:not(.btn):not(.btn-large):not(.btn-large):not(.btn-floating) { color: <?php echo $accent_color; ?>; }

      .btn, .btn-large, input.gform_button[type="submit"] { background-color: <?php echo $accent_color; ?>; }

      .btn-floating { background-color: <?php echo $accent_color; ?>; }

      .btn-floating:hover { background-color: <?php echo $accent_color; ?>; }

      .fixed-action-btn .fab-backdrop { background-color: <?php echo $accent_color; ?>; }

      .dropdown-content li > a, .dropdown-content li > span { color: <?php echo $accent_color; ?>; }

      input:not([type]):focus:not([readonly]), input[type=text]:focus:not([readonly]), input[type=password]:focus:not([readonly]), input[type=email]:focus:not([readonly]), input[type=url]:focus:not([readonly]), input[type=time]:focus:not([readonly]), input[type=date]:focus:not([readonly]), input[type=datetime]:focus:not([readonly]), input[type=datetime-local]:focus:not([readonly]), input[type=tel]:focus:not([readonly]), input[type=number]:focus:not([readonly]), input[type=search]:focus:not([readonly]), textarea:focus:not([readonly]) { border-bottom: 1px solid <?php echo $accent_color; ?>; box-shadow: 0 1px 0 0 <?php echo $accent_color; ?>; }

      input:not([type]):focus:not([readonly]) + label, input[type=text]:focus:not([readonly]) + label, input[type=password]:focus:not([readonly]) + label, input[type=email]:focus:not([readonly]) + label, input[type=url]:focus:not([readonly]) + label, input[type=time]:focus:not([readonly]) + label, input[type=date]:focus:not([readonly]) + label, input[type=datetime]:focus:not([readonly]) + label, input[type=datetime-local]:focus:not([readonly]) + label, input[type=tel]:focus:not([readonly]) + label, input[type=number]:focus:not([readonly]) + label, input[type=search]:focus:not([readonly]) + label, textarea:focus:not([readonly]) + label { color: <?php echo $accent_color; ?>; }

      .input-field .prefix.active { color: <?php echo $accent_color; ?>; }
      
      .input-field .prefix.gfield_label { color: <?php echo $accent_color; ?>; }

      [type="radio"]:checked + label:after, [type="radio"].with-gap:checked + label:before,[type="radio"].with-gap:checked + label:after { border: 2px solid <?php echo $accent_color; ?>; }
      
      [type="radio"]:checked + label:after, [type="radio"].with-gap:checked + label:after { background-color: <?php echo $accent_color; ?>; }

      [type="checkbox"]:checked + label:before { border-right: 2px solid <?php echo $accent_color; ?>; border-bottom: 2px solid <?php echo $accent_color; ?>; }

      [type="checkbox"]:checked + label:before { border-right: 2px solid <?php echo $accent_color; ?>; border-bottom: 2px solid <?php echo $accent_color; ?>; }

      [type="checkbox"]:indeterminate + label:before { border-right: 2px solid <?php echo $accent_color; ?>; }

      [type="checkbox"].filled-in:checked + label:after { border: 2px solid <?php echo $accent_color; ?>; background-color: <?php echo $accent_color; ?>; }

      [type="checkbox"].filled-in.tabbed:checked:focus + label:after { background-color: <?php echo $accent_color; ?>; border-color: <?php echo $accent_color; ?>; }

      .switch label input[type=checkbox]:checked + .lever:after { background-color: <?php echo $accent_color; ?>; }

      input[type=range] + .thumb { background-color: <?php echo $accent_color; ?>; }
      
      input[type=range] + .thumb .value { color: <?php echo $accent_color; ?>; }

      input[type=range]::-webkit-slider-thumb { background-color: <?php echo $accent_color; ?>; }

      input[type=range]::-moz-range-thumb { background: <?php echo $accent_color; ?>; }

      input[type=range]::-ms-thumb { background: <?php echo $accent_color; ?>; }

      .side-nav li > a.btn-floating:hover { background-color: <?php echo $accent_color; ?>; }

      .spinner-layer { border-color: <?php echo $accent_color; ?>; }

      .picker__date-display { background-color: <?php echo $accent_color; ?>; }

      .picker__day.picker__day--today { color: <?php echo $accent_color; ?>; }

      .picker__day--selected, .picker__day--selected:hover, .picker--focused .picker__day--selected { background-color: <?php echo $accent_color; ?>; }

      .picker__close, .picker__today { color: <?php echo $accent_color; ?>; }


    </style>
  <?php endif;
}

add_action( 'wp_head', 'smp_head_styles' );

// Custom nav walker
class smp_Footer_Walker extends Walker_Nav_Menu {
  // Displays start of an element. E.g. '<li> Item Name'
  // @see Walker::start_el()
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    $object = $item->object;
    $type = $item->type;
    $title = $item->title;
    $description = $item->description;
    $permalink = $item->url;

    $output .= "<li class=' " . implode(" ", $item->classes) . "'>";

    // Add link class
    if ( $permalink ) {
      $output .= '<a href="' . $permalink . '">';
    } else {
      $output .= '<span>';
    }

    $output .= $title;

    if( $description != '' && $depth == 0 ) {
      $output .= ' | <small class="description">' . $description . '</small>';
    }

    if ( $permalink ) {
      $output .= '</a>';
    } else {
      $output .= '</span>';
    }
  }
}

// Register wp-materialize-navwalker
require_once get_template_directory() . '/wp_materialize_navwalker.php';

// Custom comment walker
class smp_Walker_Comment extends Walker_Comment {

  public $tree_type = 'comment';
  public $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
  public function start_lvl( &$output, $depth = 0, $args = array() ) {

    $GLOBALS['comment_depth'] = $depth + 1;
    switch ( $args['style'] ) {
      case 'div':
        break;
      case 'ol':
        $output .= '<ol class="children" style="list-style-type:none!important;">' . "\n";
        break;
      case 'ul':
      default:
        $output .= '<ul class="children">' . "\n";
        break;
    }

  }

  public function end_lvl( &$output, $depth = 0, $args = array() ) {

    $GLOBALS['comment_depth'] = $depth + 1;
    switch ( $args['style'] ) {
      case 'div':
        break;
      case 'ol':
        $output .= "</ol><!-- .children -->\n";
        break;
      case 'ul':
      default:
        $output .= "</ul><!-- .children -->\n";
        break;
    }

  }

  public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

    if( !$element )
      return;
    $id_field = $this->db_fields['id'];
    $id = $element->$id_field;
    parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

    /*
     * If at the max depth, and the current element still has children, loop over those
     * and display them at this level. This is to prevent them being orphaned to the end
     * of the list.
    */

    if( $max_depth <= $depth + 1 && isset( $children_elements[$id] ) ) {
      foreach( $children_elements[$id] as $child )
        $this->display_element( $child, $children_elements, $max_depth, $depth, $args, $output );
        unset( $children_elements[$id] );
    }

  }

  public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {

    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;
    if( !empty( $args['callback'] ) ) {
      ob_start();
      call_user_func( $args['callback'], $comment, $args, $depth );
      $output .= ob_get_clean();
      return;
    }

    if( ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) && $args['short_ping'] ) {
      ob_start();
      $this->ping( $comment, $depth, $args );
      $output .= ob_get_clean();
    } elseif( 'html5' === $args['format'] ) {
      ob_start();
      $this->html5_comment( $comment, $depth, $args );
      $output .= ob_get_clean();
    } else {
      ob_start();
      $this->comment( $comment, $depth, $args );
      $output .= ob_get_clean();
    }

  }

  public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
    if( !empty( $args['end-callback'] ) ) {
      ob_start();
      call_user_func( $args['end-callback'], $comment, $args, $depth );
      $output .= ob_get_clean();
      return;
    }
  }

  protected function ping( $comment, $depth, $args ) {
    $tag = ( 'div' == $args['style'] ) ? 'div' : 'li';
?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( '', $comment ); ?>>
      <div class="comment-body">
        <?php _e( 'Pingback:', 'simply-materialized-portfolio' ); ?> <?php comment_author_link(  $comment ); ?> <?php edit_comment_link( __( 'Edit', 'simply-materialized-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
      </div>
<?php
  }

  protected function comment( $comment, $depth, $args ) {
    if( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
  ?>
    <?php echo $tag; ?> <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?> id="comment-<?php comment_ID(); ?>"> <?php if( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
      <?php if( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
      <?php
      /* translators: %s: comment author link */
      printf( __( '%s <span class="says">says:</span>', 'simply-materialized-portfolio' ), sprintf( '<cite class="fn>%s</cite>', get_comment_author_link ( $comment ) ) );
      ?>
    <?php if( '0' == $comment->comment_approved ) : ?>
    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'simply-materialized-portfolio' ) ?></em>
    <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
      <?php
        /* translators: 1: comment date, 2: comment time */
        printf( __( '%1$s at %2$s', 'simply-materialized-portfolio' ), get_comment_date( '', $comment ), get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'simply-materialized-portfolio' ), '&nbsp;&nbsp;', '' );
      ?>
    </div>

    <?php comment_text( $comment, array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => args['max_depth'] ) ) ); ?>

    <?php
    comment_reply_link( array_merge( $args, array(
      'add_below' => $add_below,
      'depth' => $depth,
      'max_depth' => $args['max_depth'],
      'before' => '<div class="reply">',
      'after' => '</div>'
    ) ) );
    ?>

    <?php if( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
  <?php
  }

  protected function html5_comment( $comment, $depth, $args ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
  ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
      <article id="div-comment-<?php comment_ID(); ?>">
        <div class="row">
          <div class="col s12">
            <div class="card" >
              <div class="card-content">
                <div class="row">
                  <div class="col s3 m3 l2">
                    <?php if( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], '', '', array( 'class' => 'circle' ) ); ?>
                  </div>
                  <div class="col s9 m9 l10">
                    <div class="row">
                      <div class="col s6 m6 l7">
                        <?php
                          /* translators: %s: comment author link */
                          printf( __( '<strong>%s</strong>', 'simply-materialized-portfolio' ),
                          sprintf( '<strong class="fn">%s</strong>', get_comment_author_link( $comment ) ) );
                        ?>
                      </div>
                      <div class="col s6 m6 l5">
                        <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                          <?php 
                            printf( _x( '%s ago', '%s = human-readable time difference', 'simply-materialized-portfolio' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) );
                          ?>
                        </a>
                      </div>
                    </div>
                    <?php if( '0' == $comment->comment_approved ) : ?>
                      <div class="row">
                        <div class="col s12">
                          <p class="flow-text green-text"><?php _e( 'Your comment is awaiting moderation.', 'simply-materialized-portfolio' ); ?></p>
                        </div>
                      </div>
                    <?php endif; ?>
                    <div class="row">
                      <div class="col s12">
                        <?php comment_text(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-action">
                <?php
                  comment_reply_link( array_merge( $args, array(
                    'add_below' => 'div-comment',
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'before' => '',
                    'after' => ''
                  ) ) );
                ?>
                <?php edit_comment_link( __( 'Edit', 'simply-materialized-portfolio' ), '', '' );?>
              </div>
            </div>
          </div>
        </div>
      </article>
    </<?php echo $tag; ?>>
  <?php
  }

}

// Link to parent comment
function link_to_parent_comment( $comment ) {
  $comment_id = get_comment_id();
  $comment_id = get_comment( $comment_id );
  if( $comment_id->comment_parent ) {
    $parent = get_comment( $comment_id->comment_parent );
    $parent_link = get_comment_link( $parent );
    $parent_author = get_comment_author( $parent );
    $parent_excerpt = get_comment_excerpt( $parent );
    $comment = '<p>In reply to <a href="' . $parent_link . '">' . $parent_author . '</a></p><blockquote>' . $parent_excerpt . '</blockquote>' .  $comment;
  }
  return $comment;
}

add_filter( 'get_comment_text', 'link_to_parent_comment' );

// Menu link active classes
function smp_nav_class( $classes, $item ) {
  if ( in_array('current-menu-item', $classes) ) {
    $classes[] = 'active';
  }
  return $classes;
}

add_filter ( 'nav_menu_css_class', 'smp_nav_class', 10, 2 );

// Theme menus
add_theme_support( 'menus' );

function register_theme_menus() {

  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu', 'simply-materialized-portfolio' ),
      'secondary-menu' => __( 'Secondary Menu', 'simply-materialized-portfolio' )
    )
  );

}

// Hook theme menus function to theme setup
add_action ( 'init', 'register_theme_menus' );

// Control max excerpt length
function smp_excerpt_length( $length ) {

  return 50;

}

add_filter ( 'excerpt_length', 'smp_excerpt_length', 999 );

// Change search results per page
function change_wp_search_size($queryVars) {

	if ( isset($_REQUEST['s']) )
		$queryVars['posts_per_page'] = 10;
	return $queryVars;

}

add_filter('request', 'change_wp_search_size');

// Add IDs to headings
function smp_id_headings( $content ) {

  $content = preg_replace_callback('/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
    if( ! stripos( $matches[0], 'id=' ) ) :
      $matches[0] = $matches[1] . $matches[2] . '>' . $matches[3] . $matches[4];
      $matching_div = '<span class="section scrollspy" id="' . sanitize_title($matches[3] ) . '">' . $matches[0] . '</span>';
    endif;
    return $matching_div;
  }, $content);

  return $content;

}

add_filter( 'the_content', 'smp_id_headings' );

// Generate list of headings
function smp_headings_list( $content ) {
  if( is_single() ) {
    preg_match_all( '/(\<h[1-6]\>(.*)<\/h[1-6]>)/i', $content, $matches, PREG_PATTERN_ORDER );
    $matches = $matches[2];
    $string = '<ul class="section table-of-contents">';
    foreach( $matches as $match ) {
      $string .= '<li><a href="#' . sanitize_title( $match ) . '">' . $match . '</a></li>';
    }
    $string .= '</ul>';
    if( !empty($matches) ) {
      echo $string;
    }
    
  }

}

// Popular Posts
function smp_set_post_views( $postID ) {
  $count_key = 'smp_post_views_count';
  $count = get_post_meta( $postID, $count_key, true );
  if( $count == '' ) {
    $count = 0;
    delete_post_meta( $postID, $count_key);
    add_post_meta( $postID, $count_key, '0' );
  } else {
    $count++;
    update_post_meta( $postID, $count_key, $count );
  }
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );

function smp_post_views( $postID ) {
  $count_key = 'smp_post_views_count';
  $count = get_post_meta( $postID, $count_key, true );
  if( $count == '' ) {
    delete_post_meta( $postID, $count_key );
    add_post_meta( $postID, $count_key, '0' );
    return '0 Views';
  }
  return $count . ' Views';
}

// Widgets
function smp_create_widget( $name, $id, $description ) {

  register_sidebar(array(
    'name' => $name,
    'id' => $id,
    'description' => $description,
    'before_widget' => '<div class="widget row"><div class="col s12 m12 l10 offset-l1">',
    'after_widget' => '</div></div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));

}

function smp_widgets_init() {

  smp_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section.' );
  smp_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar.' );
  smp_create_widget( 'Footer Widget', 'footer', 'Displays on the footer.' );

}

add_action( 'widgets_init', 'smp_widgets_init' );

// Numeric pagination
function smp_numeric_pagination( $query ) {

  /* Stop execution if on a single post page */
  if( is_singular() )
    return;
  $query;

  /* Stop execution if there's only 1 page' */
  if( $query->max_num_pages <= 1 )
    return;
  
  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max = intval( $query->max_num_pages );

  /* Add current page to the array */
  if( $paged >= 1 )
    $links[] = $paged;
  
  /* Add the pages around the current page to the array */
  if( $paged >= 3 ) {
    $links[] = $paged -1;
    $links[] = $paged -2;
  }

  if( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<ul class="pagination">' . "\n";

  /* Echo Previous Post Link */
  if( get_previous_posts_link() ) {
    printf( '<li class="waves-effect">%s</li>' . "\n" , get_previous_posts_link( '<i class="material-icons">chevron_left</i>' ) );
  } else {
    printf( '<li class="disabled">%s</li>' . "\n", '<a href="#"><i class="material-icons">chevron_left</i></a>' );
  }

  /* Link to first page, plus ellises if necessary */
  if( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="waves-effect active"' : ' class="waves-effect"';
    printf( '<li%s><a href="%s">%s</a></li>'. "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if( ! in_array( 2, $links ) )
      echo '<li><i class="material-icons">more_horiz</i></li>' . "\n";
  }

  /* Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="waves-effect active"' : ' class="waves-effect"';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /* Link to last page, plus ellipses if necessary */

  if( ! in_array( $max, $links ) ) {
    if( ! in_array( $max - 1, $links ) )
      echo '<li><i class="material-icons">more_horiz</i></li>' . "\n";

      $class = $paged == $max ? ' class="waves-effect active"' : ' class="waves-effect"';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /* Next Post Link */
  if( get_next_posts_link() ) {
    printf( '<li class="waves-effect">%s</li>' . "\n" , get_next_posts_link( '<i class="material-icons">chevron_right</i>' ) );
  } else {
    printf( '<li class="disabled">%s</li>' . "\n", '<a href="#"><i class="material-icons">chevron_right</i></a>' );
  }

    echo '</ul>' . "\n";

}

// Custom edit_post_link with tooltips
function smp_edit_post_link( $text = null, $before = '', $after = '', $id = 0, $class = 'post-edit-link', $tooltip = '', $position = '' ) {
  if( ! $post = get_post( $id ) ) {
    return;
  }
  
  if( ! $url = get_edit_post_link( $post->ID ) ) {
    return;
  }

  if( null === $text ) {
    $text = __( 'Edit This', 'simply-materialized-portfolio' );
  }

  if( $tooltip != '' and ( $position === 'top' or $position === 'bottom' or $position === 'left' or $position === 'right' )) {
    $link = '<a class="' . esc_attr( $class ) . ' tooltipped" data-position="' . $position . '" data-delay="50" data-tooltip="' . $tooltip  . '" href="' . esc_url( $url ) . '">' . $text . '</a>';
  } else {
    $link = '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $url ) . '">' . $text . '</a>';
  }

  echo $before . apply_filters( 'smp_edit_post_link', $link, $post->ID, $text ) . $after;

}

// Queue theme styles
function smp_theme_styles() {

  wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'materialize_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
  wp_enqueue_style( 'mfizz_icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-mfizz/2.4.1/font-mfizz.css' );

}

// Hook theme styles function to script loading
add_action ( 'wp_enqueue_scripts', 'smp_theme_styles' );

// Queue theme scripts
function smp_theme_js() {

  wp_enqueue_script( 'materialize_js', get_template_directory_uri() . '/js/bin/materialize.js', array('jquery'), '', true );
  wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'materialize_js'), '', true );
  wp_enqueue_script( 'fontawesome_js', 'https://use.fontawesome.com/183df169fb.js', '', '', false );

}

// Hook theme scripts function to script loading
add_action ( 'wp_enqueue_scripts', 'smp_theme_js' );

// Remove visual editor
add_filter ( 'user_can_richedit', create_function ( '$a', 'return false;' ), 50 );

// Remove Gravity Forms Styles
add_filter( 'pre_option_rg_gforms_disable_css', '__return_true' );

// Apply theme's stylesheet to visual editor
function smp_add_editor_styles() {
  add_editor_style( get_stylesheet_uri() );
}

add_action( 'init', 'smp_add_editor_styles' );

?>