<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)

// Options panel
require_once('library/options-panel.php');

// Shortcodes
require_once('library/shortcodes.php');

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

/* DEFINE BASE AND TEMPLATE URLS */
define('BASE_URL', get_bloginfo('url'));
define('TEMPLATE_URL', get_template_directory_uri());

// Custom Backend Admin Footer
//add_filter('admin_footer_text', 'bones_custom_admin_footer');

function bones_custom_admin_footer() {
	echo '<span id="footer-thankyou">Developed by <a href="http://4geeks.co" target="_blank">4Geeks</a></span>. Built using <a href="http://twitter.github.io/bootstrap/index.html" target="_blank">BootStrap</a>.';
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');

// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 *
 * @return string Filtered title.
 *
 * @note may be called from http://example.com/wp-activate.php?key=xxx where the plugins are not loaded.
 */
function bones_filter_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'bonestheme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'bones_filter_title', 10, 2 );


/************* THUMBNAIL SIZE OPTIONS *************/

//Applications thumbnail sizes
add_image_size( 'wp-apps-thumb', 78, 78, true );
add_image_size( 'wp-apps-featured', 124, 124, true );

// Thumbnail sizes
add_image_size( 'wpbs-featured-mini', 70, 100, true );
add_image_size( 'wpbs-featured-small', 240, 160, true );
add_image_size( 'wpbs-featured', 638, 300, true );
add_image_size( 'wpbs-featured-home', 970, 311, true);
add_image_size( 'wpbs-featured-carousel', 970, 400, true);

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Main Sidebar',
    	'description' => 'Used on every page BUT the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<div class="bar span12"><span class="bar-line"></span><h5 class="widgettitle">',
    	'after_title' => '</h5></div>',
    ));
    
    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Homepage Sidebar',
    	'description' => 'Used only on the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<div class="bar span12"><span class="bar-line"></span><h5 class="widgettitle">',
    	'after_title' => '</h5></div>',
    ));

	register_sidebar(array(
    	'id' => 'sidebar3',
    	'name' => 'Apps Sidebar',
    	'description' => 'Used only on the apps page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<div class="bar span12"><span class="bar-line"></span><h5 class="widgettitle">',
    	'after_title' => '</h5></div>',
    ));
    
    register_sidebar(array(
      'id' => 'footer1',
      'name' => 'Footer 1',
	  'description' => 'Used only for twitter(Do not touch)',
      'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer2',
      'name' => 'Footer 2',
      'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer3',
      'name' => 'Footer 3',
      'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    
    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard row-fluid clearfix">
				<div class="avatar span3">
					<?php echo get_avatar( $comment, $size='75' ); ?>
				</div>
				<div class="span9 comment-text">
					<?php printf('<h4>%s</h4>', get_comment_author_link()) ?>
					<?php edit_comment_link(__('Edit','bonestheme'),'<span class="edit-comment btn btn-small btn-info"><i class="icon-white icon-pencil"></i>','</span>') ?>
                    
                    <?php if ($comment->comment_approved == '0') : ?>
       					<div class="alert-message success">
          				<p><?php _e('Your comment is awaiting moderation.','bonestheme') ?></p>
          				</div>
					<?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
                    
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
			</div>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;<?php comment_author_link(); ?>
<?php 

}

// Only display comments in comment count (which isn't currently displayed in wp-bootstrap, but i'm putting this in now so i don't forget to later)
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
	    $comments_by_type = separate_comments(get_comments('status=approve&post_id=' . $id));
	    return count($comments_by_type['comment']);
	} else {
	    return $count;
	}
}

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch( $form ) {
  $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
  <label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
  <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the Site..." />
  <input type="submit" id="searchsubmit" value="'. esc_attr__('Search','bonestheme') .'" />
  </form>';
  return $form;
} // don't remove this bracket!

/****************** password protected post form *****/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
	' . '<p>' . __( "This post is password protected. To view it please enter your password below:" ,'bonestheme') . '</p>' . '
	<label for="' . $label . '">' . __( "Password:" ,'bonestheme') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__( "Submit",'bonestheme' ) . '" /></div>
	</form></div>
	';
	return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

// filter tag cloud output so that it can be styled by CSS
function add_tag_class( $taglinks ) {
    $tags = explode('</a>', $taglinks);
    $regex = "#(.*tag-link[-])(.*)(' title.*)#e";
    //$term_slug = "(get_tag($2) ? get_tag($2)->slug : get_category($2)->slug)";
	$term_slug = 'get_term( $2, $_GET["taxonomy"] )->slug';

        foreach( $tags as $tag ) {
        	$tagn[] = preg_replace($regex, "('$1$2 label tag-'.$term_slug.'$3')", $tag );
        }

    $taglinks = implode('</a>', $tagn);

    return $taglinks;
}

add_action( 'wp_tag_cloud', 'add_tag_class' );

add_filter( 'wp_tag_cloud','wp_tag_cloud_filter', 10, 2) ;

function wp_tag_cloud_filter( $return, $args )
{
  return '<div id="tag-cloud">' . $return . '</div>';
}

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Disable jump in 'read more' link
function remove_more_jump_link( $link ) {
	$offset = strpos($link, '#more-');
	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_jump_link' );

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Add the Meta Box to the homepage template
function add_homepage_meta_box() {  
	global $post;

	// Only add homepage meta box if template being used is the homepage template
	// $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : "");
	$post_id = $post->ID;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

	if ( $template_file == 'page-homepage.php' ){
	    add_meta_box(  
	        'homepage_meta_box', // $id  
	        'Optional Homepage Tagline', // $title  
	        'show_homepage_meta_box', // $callback  
	        'page', // $page  
	        'normal', // $context  
	        'high'); // $priority  
    }
}

add_action( 'add_meta_boxes', 'add_homepage_meta_box' );

// Field Array  
$prefix = 'custom_';  
$custom_meta_fields = array(  
    array(  
        'label'=> 'Homepage tagline area',  
        'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  
        'id'    => $prefix.'tagline',  
        'type'  => 'textarea' 
    )  
);  

// The Homepage Meta Box Callback  
function show_homepage_meta_box() {  
  global $custom_meta_fields, $post;

  // Use nonce for verification
  wp_nonce_field( basename( __FILE__ ), 'wpbs_nonce' );
    
  // Begin the field table and loop
  echo '<table class="form-table">';

  foreach ( $custom_meta_fields as $field ) {
      // get value of this field if it exists for this post  
      $meta = get_post_meta($post->ID, $field['id'], true);  
      // begin a table row with  
      echo '<tr> 
              <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
              <td>';  
              switch($field['type']) {  
                  // text  
                  case 'text':  
                      echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;
                  
                  // textarea  
                  case 'textarea':  
                      echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;  
              } //end switch  
      echo '</td></tr>';  
  } // end foreach  
  echo '</table>'; // end table  
}  

// Save the Data  
function save_homepage_meta( $post_id ) {  

    global $custom_meta_fields;  
  
    // verify nonce  
    if ( !isset( $_POST['wpbs_nonce'] ) || !wp_verify_nonce($_POST['wpbs_nonce'], basename(__FILE__)) )  
        return $post_id;

    // check autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    // check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
    }
  
    // loop through fields and save the data  
    foreach ( $custom_meta_fields as $field ) {
        $old = get_post_meta( $post_id, $field['id'], true );
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta( $post_id, $field['id'], $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, $field['id'], $old );
        }
    } // end foreach
}
add_action( 'save_post', 'save_homepage_meta' );

// Add thumbnail class to thumbnail links
function add_class_attachment_link( $html ) {
    $postid = get_the_ID();
    $html = str_replace( '<a','<a class="thumbnail"',$html );
    return $html;
}
add_filter( 'wp_get_attachment_link', 'add_class_attachment_link', 10, 1 );

// Add lead class to first paragraph
function first_paragraph( $content ){
    global $post;

    // if we're on the homepage, don't add the lead class to the first paragraph of text
    if( is_page_template( 'page-homepage.php' ) )
        return $content;
    else
        return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter( 'the_content', 'first_paragraph' );

// Menu output mods
/* Bootstrap_Walker for Wordpress 
     * Author: George Huger, Illuminati Karate, Inc 
     * More Info: http://illuminatikarate.com/blog/bootstrap-walker-for-wordpress 
     * 
     * Formats a Wordpress menu to be used as a Bootstrap dropdown menu (http://getbootstrap.com). 
     * 
     * Specifically, it makes these changes to the normal Wordpress menu output to support Bootstrap: 
     * 
     *        - adds a 'dropdown' class to level-0 <li>'s which contain a dropdown 
     *         - adds a 'dropdown-submenu' class to level-1 <li>'s which contain a dropdown 
     *         - adds the 'dropdown-menu' class to level-1 and level-2 <ul>'s 
     * 
     * Supports menus up to 3 levels deep. 
     *  
     */ 
    class Bootstrap_Walker extends Walker_Nav_Menu 
    {     
 
        /* Start of the <ul> 
         * 
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".  
         *                   So basically add one to what you'd expect it to be 
         */         
        function start_lvl(&$output, $depth) 
        {
            $tabs = str_repeat("\t", $depth); 
            // If we are about to start the first submenu, we need to give it a dropdown-menu class 
            if ($depth == 0 || $depth == 1) { //really, level-1 or level-2, because $depth is misleading here (see note above) 
                $output .= "\n{$tabs}<ul class=\"dropdown-menu\">\n"; 
            } else { 
                $output .= "\n{$tabs}<ul>\n"; 
            } 
            return;
        } 
 
        /* End of the <ul> 
         * 
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".  
         *                   So basically add one to what you'd expect it to be 
         */         
        function end_lvl(&$output, $depth)  
        {
            if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!) 
 
                // we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now 
                $output .= '<!--.dropdown-->'; 
            } 
            $tabs = str_repeat("\t", $depth); 
            $output .= "\n{$tabs}</ul>\n"; 
            return; 
        }
 
        /* Output the <li> and the containing <a> 
         * Note: $depth is "correct" at this level 
         */         
        function start_el(&$output, $item, $depth, $args)  
        {    
            global $wp_query; 
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : ''; 
            $class_names = $value = ''; 
            $classes = empty( $item->classes ) ? array() : (array) $item->classes; 
 
            /* If this item has a dropdown menu, add the 'dropdown' class for Bootstrap */ 
            if ($item->hasChildren) { 
                $classes[] = 'dropdown'; 
                // level-1 menus also need the 'dropdown-submenu' class 
                if($depth == 1) { 
                    $classes[] = 'dropdown-submenu'; 
                } 
            } 
 
            /* This is the stock Wordpress code that builds the <li> with all of its attributes */ 
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ); 
            $class_names = ' class="' . esc_attr( $class_names ) . '"'; 
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';             
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : ''; 
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : ''; 
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : ''; 
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
            $item_output = $args->before; 
 
            /* If this item has a dropdown menu, make clicking on this link toggle it */ 
            if ($item->hasChildren && $depth == 0) { 
                $item_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="dropdown">'; 
            } else { 
                $item_output .= '<a'. $attributes .'>'; 
            } 
 
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after; 
 
            /* Output the actual caret for the user to click on to toggle the menu */             
            if ($item->hasChildren && $depth == 0) { 
                $item_output .= '<b class="caret"></b></a>'; 
            } else { 
                $item_output .= '</a>'; 
            } 
 
            $item_output .= $args->after; 
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ); 
            return; 
        }
 
        /* Close the <li> 
         * Note: the <a> is already closed 
         * Note 2: $depth is "correct" at this level 
         */         
        function end_el (&$output, $item, $depth, $args)
        {
            $output .= '</li>'; 
            return;
        } 
 
        /* Add a 'hasChildren' property to the item 
         * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633  
         */ 
        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) 
        { 
            // check whether this item has children, and set $item->hasChildren accordingly 
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]); 
 
            // continue with normal behavior 
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); 
        }         
    } 
add_editor_style('editor-style.css');

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
	}
  
  return $classes;
}

// enqueue styles
if( !function_exists("theme_styles") ) {  
    function theme_styles() { 
        // This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
        wp_register_style( 'bootstrap', get_template_directory_uri() . '/library/css/bootstrap.css', array(), '1.0', 'all' );
        wp_register_style( 'bootstrap-responsive', get_template_directory_uri() . '/library/css/responsive.css', array(), '1.0', 'all' );
        wp_register_style( 'wp-bootstrap', get_stylesheet_uri(), array(), '1.0', 'all' );
        
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'bootstrap-responsive' );
        wp_enqueue_style( 'wp-bootstrap');
    }
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

// enqueue javascript
if( !function_exists( "theme_js" ) ) {  
  function theme_js(){
  
    wp_register_script( 'bootstrap', 
      get_template_directory_uri() . '/library/js/bootstrap.min.js', 
      array('jquery'), 
      '1.2' );
  
    wp_register_script( 'wpbs-scripts', 
      get_template_directory_uri() . '/library/js/scripts.js', 
      array('jquery'), 
      '1.2' );
  
    wp_register_script(  'modernizr', 
      get_template_directory_uri() . '/library/js/modernizr.full.min.js', 
      array('jquery'), 
      '1.2' );
  
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('wpbs-scripts');
    wp_enqueue_script('modernizr');
    
  }
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

// Get theme options
function get_wpbs_theme_options(){
  $theme_options_styles = '';
/*    
      $heading_typography = of_get_option( 'heading_typography' );
      if ( $heading_typography['face'] != 'Default' ) {
        $theme_options_styles .= '
        h1, h2, h3, h4, h5, h6{ 
          font-family: ' . $heading_typography['face'] . '; 
          font-weight: ' . $heading_typography['style'] . '; 
          color: ' . $heading_typography['color'] . '; 
        }';
      }
      
      $main_body_typography = of_get_option( 'main_body_typography' );
      if ( $main_body_typography['face'] != 'Default' ) {
        $theme_options_styles .= '
        body{ 
          font-family: ' . $main_body_typography['face'] . '; 
          font-weight: ' . $main_body_typography['style'] . '; 
          color: ' . $main_body_typography['color'] . '; 
        }';
      }
      
      $link_color = of_get_option( 'link_color' );
      if ($link_color) {
        $theme_options_styles .= '
        a{ 
          color: ' . $link_color . '; 
        }';
      }
      
      $link_hover_color = of_get_option( 'link_hover_color' );
      if ($link_hover_color) {
        $theme_options_styles .= '
        a:hover{ 
          color: ' . $link_hover_color . '; 
        }';
      }
      
      $link_active_color = of_get_option( 'link_active_color' );
      if ($link_active_color) {
        $theme_options_styles .= '
        a:active{ 
          color: ' . $link_active_color . '; 
        }';
      }
*/      
      $topbar_position = of_get_option( 'nav_position' );
      if ($topbar_position == 'scroll') {
        $theme_options_styles .= '
        .navbar{ 
          position: static; 
        }
        body{
          padding-top: 0;
        }
        #content {
          padding-top: 27px;
        }
        ' 
        ;
      }
      
      $topbar_bg_color = of_get_option( 'top_nav_bg_color' );
      $use_gradient = of_get_option( 'showhidden_gradient' );

      if ( $topbar_bg_color && !$use_gradient ) {
        $theme_options_styles .= '
        .navbar-inner, .navbar .fill { 
          background-color: '. $topbar_bg_color . ';
          background-image: none;
        }' . $topbar_bg_color;
      }
      
      if ( $use_gradient ) {
        $topbar_bottom_gradient_color = of_get_option( 'top_nav_bottom_gradient_color' );
      
        $theme_options_styles .= '
        .navbar-inner, .navbar .fill {
          background-image: -khtml-gradient(linear, left top, left bottom, from(' . $topbar_bg_color . '), to('. $topbar_bottom_gradient_color . '));
          background-image: -moz-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
          background-image: -ms-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
          background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, ' . $topbar_bg_color . '), color-stop(100%, '. $topbar_bottom_gradient_color . '));
          background-image: -webkit-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . '2);
          background-image: -o-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
          background-image: linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'' . $topbar_bg_color . '\', endColorstr=\''. $topbar_bottom_gradient_color . '2\', GradientType=0);
        }';
      }
      else{
      } 
      
      $topbar_link_color = of_get_option( 'top_nav_link_color' );
      if ( $topbar_link_color ) {
        $theme_options_styles .= '
        .navbar .nav li a { 
          color: '. $topbar_link_color . ';
        }';
      }
      
      $topbar_link_hover_color = of_get_option( 'top_nav_link_hover_color' );
      if ( $topbar_link_hover_color ) {
        $theme_options_styles .= '
        .navbar .nav li a:hover { 
          color: '. $topbar_link_hover_color . ';
        }';
      }
      
      $topbar_dropdown_hover_bg_color = of_get_option( 'top_nav_dropdown_hover_bg' );
      if ( $topbar_dropdown_hover_bg_color ) {
        $theme_options_styles .= '
          .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover {
            background-color: ' . $topbar_dropdown_hover_bg_color . ';
          }
        ';
      }
      
      $topbar_dropdown_item_color = of_get_option( 'top_nav_dropdown_item' );
      if ( $topbar_dropdown_item_color ){
        $theme_options_styles .= '
          .dropdown-menu a{
            color: ' . $topbar_dropdown_item_color . ' !important;
          }
        ';
      }
      
      $hero_unit_bg_color = of_get_option( 'hero_unit_bg_color' );
      if ( $hero_unit_bg_color ) {
        $theme_options_styles .= '
        .hero-unit { 
          background-color: '. $hero_unit_bg_color . ';
        }';
      }
      
      $suppress_comments_message = of_get_option( 'suppress_comments_message' );
      if ( $suppress_comments_message ){
        $theme_options_styles .= '
        #main article {
          border-bottom: none;
        }';
      }
      
      $additional_css = of_get_option( 'wpbs_css' );
      if( $additional_css ){
        $theme_options_styles .= $additional_css;
      }
          
      if( $theme_options_styles ){
        echo '<style>' 
        . $theme_options_styles . '
        </style>';
      }
    
      $bootstrap_theme = of_get_option( 'wpbs_theme' );
      $use_theme = of_get_option( 'showhidden_themes' );
      
      if( $bootstrap_theme && $use_theme ){
        if( $bootstrap_theme == 'default' ){}
        else {
          echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/admin/themes/' . $bootstrap_theme . '.css">';
        }
      }
} // end get_wpbs_theme_options function


/************* CUSTOM POST TYPES: APPLICATIONS *****************/
add_action( 'init', 'create_app_post_type' );

function create_app_post_type() {
	register_post_type( 'ec_applications',
		array(
			'labels' => array(
				'name' => __( 'Aplicaciones' ),
				'singular_name' => __( 'Aplicación' )
			),
		'public' => true,
		'menu_position' => 5,
	    'rewrite' => array('slug' => 'aplicaciones'),
		'has_archive' => true,
		'menu_icon' => TEMPLATE_URL.'/images/admin/icons/admin_apps.png',
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ),
		)
	);
}

/* CREAR TAXONIMIA:CATEGORIAS,EQUIPOS,SO PARA APLICACIONES */
function custom_category_application_init() {
	register_taxonomy(
		'ec_category_applications',
    	'ec_applications',
    	array(
			'labels' => array(
				'name' 				=> __( 'Categorías' ),
				'singular_name' 	=> __( 'Categoría' ),
				'search_items'      => __( 'Buscar Categoría' ),
				'all_items'         => __( 'Todas las Categorías' ),
				'parent_item'       => __( 'Categoría Padre' ),
				'parent_item_colon' => __( 'Categoría Padre:' ),
				'edit_item'         => __( 'Editar Categoría' ),
				'update_item'       => __( 'Actualizar Categoría' ),
				'add_new_item'      => __( 'Agregar Categoría' ),
				'menu_name'         => __( 'Categorías' ),
			),
      	 	'hierarchical' => true,
      		'label' => 'Categorias',
      		'query_var' => true,
      		'rewrite' => array('slug' => 'categoria-aplicaciones')
    	)
  	);
}
add_action( 'init', 'custom_category_application_init' );

function custom_equipos_application_init() {
	register_taxonomy(
		'ec_equipos',
    	'ec_applications',
    	 array(
			'labels' => array(
				'name' 				=> __( 'Equipos' ),
				'singular_name' 	=> __( 'Equipo' ),
				'search_items'      => __( 'Buscar Equipo' ),
				'all_items'         => __( 'Todos los Equipos' ),
				'parent_item'       => __( 'Modelo Padre' ),
				'parent_item_colon' => __( 'Modelo Padre:' ),
				'edit_item'         => __( 'Editar Equipo' ),
				'update_item'       => __( 'Actualizar Equipo' ),
				'add_new_item'      => __( 'Agregar Equipo' ),
				'separate_items_with_commas' => __( 'Separar Equipos con comas' ),
				'add_or_remove_items'        => __( 'Agregar o Eliminar equipos' ),
				'choose_from_most_used'      => __( 'Elige entre los equipos mas usados' ),
				'not_found'                  => __( 'No se encontraron Equipos.' ),
				'menu_name'         => __( 'Equipos' ),
			),
      	 	'hierarchical' => true,
      		'label' => 'Equipos',
      		'query_var' => true,
      		'rewrite' => array('slug' => 'equipos')
    	  )
  	);
}
add_action( 'init', 'custom_equipos_application_init' );

function custom_so_application_init() {
	register_taxonomy(
		'ec_sistema_operativo',
    	'ec_applications',
    	 array(
			'labels' => array(
				'name' 				=> __( 'Sistemas Operativos' ),
				'singular_name' 	=> __( 'Sistema Operativo' ),
				'search_items'      => __( 'Buscar S.O' ),
				'all_items'         => __( 'Todos los S.O' ),
				'edit_item'         => __( 'Editar S.O' ),
				'update_item'       => __( 'Actualizar S.O' ),
				'add_new_item'      => __( 'Agregar S.O' ),
				'separate_items_with_commas' => __( 'Separar S.O con comas' ),
				'add_or_remove_items'        => __( 'Agregar o Eliminar S.O' ),
				'choose_from_most_used'      => __( 'Elige entre S.O mas usados' ),
				'not_found'                  => __( 'No se encontraron S.O.' ),
				'menu_name'         => __( 'Sistemas Operativos' ),
			),
      	 	'hierarchical' => false,
      		'label' => 'sistema_operativo',
      		'query_var' => true,
      		'rewrite' => array('slug' => 'sistema_operativo')
    	  )
  	);
}
add_action( 'init', 'custom_so_application_init' );

function custom_provider_application_init() {
	register_taxonomy(
		'ec_proveedor',
    	'ec_applications',
    	 array(
			'labels' => array(
				'name' 				=> __( 'Proveedores' ),
				'singular_name' 	=> __( 'Proveedor' ),
				'search_items'      => __( 'Buscar Proveedor' ),
				'all_items'         => __( 'Todos los Proveedores' ),
				'edit_item'         => __( 'Editar Proveedor' ),
				'update_item'       => __( 'Actualizar Proveedor' ),
				'add_new_item'      => __( 'Agregar Proveedor' ),
				'separate_items_with_commas' => __( 'Separar proveedores con comas' ),
				'add_or_remove_items'        => __( 'Agregar o Eliminar proveedores' ),
				'choose_from_most_used'      => __( 'Elige entre proveedores mas usados' ),
				'not_found'                  => __( 'No se encontraron Proveedores.' ),
				'menu_name'         => __( 'Proveedores' ),
			),
      	 	'hierarchical' => false,
      		'label' => 'proveedores',
      		'query_var' => true,
      		'rewrite' => array('slug' => 'proveedor-aplicaciones')
    	  )
  	);
}
add_action( 'init', 'custom_provider_application_init' );

/*********************************************************************************
// AGREGAR CAMPOS A FILTRAR EN VISTA DE CUSTOM POST

// Filter the request to just give posts for the given taxonomy, if applicable.
	function taxonomy_filter_restrict_manage_posts() {
	    global $typenow;
	 	
		if ($typenow != "ec_applications")
			return;
	    // If you only want this to work for your specific post type,
	    // check for that $type here and then return.
	    // This function, if unmodified, will add the dropdown for each
	    // post type / taxonomy combination.
	 
	    $post_types = get_post_types( array( '_builtin' => false ) );
	 
	    if ( in_array( $typenow, $post_types ) ) {
	      $filters = get_object_taxonomies( $typenow );
	 		//if (sizeof($filters)==0)
	        foreach ( $filters as $tax_slug ) {
	            $tax_obj = get_taxonomy( $tax_slug );
	
	            wp_dropdown_categories( array(
	                'show_option_all' => __('Mostrar '.$tax_obj->label ),
	                'taxonomy'    => $tax_slug,
	                'name'      => $tax_obj->name,
	                'orderby'     => 'name',
	                //'selected'    => $_GET[$tax_slug],
	                'hierarchical'    => $tax_obj->hierarchical,
	                'show_count'    => false,
	                'hide_empty'    => true
	            ) );
	        }
	    }
	}
	 
	add_action( 'restrict_manage_posts', 'taxonomy_filter_restrict_manage_posts' );	
	function taxonomy_filter_post_type_request( $query ) {
		  global $pagenow, $typenow;
		 
		  if ( 'edit.php' == $pagenow ) {
		    $filters = get_object_taxonomies( $typenow );
		    foreach ( $filters as $tax_slug ) {
		      $var = &$query->query_vars[$tax_slug];
		      if ( isset( $var ) ) {
		        $term = get_term_by( 'id', $var, $tax_slug );
				if ( isset($term->slug) )
		        	$var = $term->slug;
		      }
		    }
		  }
		}
		 
		add_filter( 'parse_query', 'taxonomy_filter_post_type_request' );

*********************************************************************************/

/************************ NUEVOS CAMPOS A CUSTOM POST APPS **********************************
/**
 * Display the metabox
*/
function url_custom_metabox() {
	global $post;
	$ec_application_urllink = get_post_meta( $post->ID, 'ec_application_urllink', true );
	
	if ($ec_application_urllink != ""){
		if ( !preg_match( "/http(s?):\/\//", $ec_application_urllink )) {
			$errors = 'Url no valido';
		}
	}else{
	    $ec_application_urllink = 'http://';
	}	
	
	// output invlid url message and add the http:// to the input field
	if( isset($errors) ) { echo $errors; } ?>     
	    <p class="appurl_wrap">
			<label for="appurl">URL:</label>
			<input id="appurl" type="url" size="37" name="appurl" value="<?php if( $ec_application_urllink ) { echo $ec_application_urllink; } ?>" />
		</p>
	<?php
}

/**
 * Process the custom metabox fields
*/
function save_custom_url( $post_id ) {
	global $post;  
	     
	if( isset($_POST['appurl']) ) {
    	update_post_meta( $post->ID, 'ec_application_urllink', $_POST['appurl'] );
	}
}

// Add action hooks. Without these we are lost
add_action( 'admin_init', 'add_custom_metabox' );
add_action( 'save_post', 'save_custom_url' );
	 
/**
 * Add meta box
*/
function add_custom_metabox() {
	add_meta_box( 
		'custom-metabox', //id
		__( 'URL de Aplicación' ), //title
		'url_custom_metabox', //callback
		'ec_applications', //page or post type
		'normal', //context
		'high' //priority
	);
}

/**
 * Get and return the values for the URL and description
*/
function get_app_url_box() {
	global $post;
	$ec_application_urllink = get_post_meta( $post->ID, 'ec_application_urllink', true );
	 
	return $ec_application_urllink;
}

/*********************************************************************************/

/************* CUSTOM POST TYPES: VIDEOS  Y MUSICA *****************/
add_action( 'init', 'create_video_post_type' );

function create_video_post_type() {
	register_post_type( 'ec_videos',
		array(
			'labels' => array(
				'name' => __( 'Videos' ),
				'singular_name' => __( 'Video' )
			),
		'public' => true,
		'menu_position' => 5,
	    'rewrite' => array('slug' => 'videos'),
		'has_archive' => true,
		'menu_icon' => TEMPLATE_URL.'/images/admin/icons/admin_video.png',
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ),
		)
	);
}

/* CREAR TAXONIMIA:CATEGORIAS */
function custom_category_video_init() {
	register_taxonomy(
		'ec_category_videos',
    	'ec_videos',
    	array(
			'labels' => array(
				'name' 				=> __( 'Categorías' ),
				'singular_name' 	=> __( 'Categoría' ),
				'search_items'      => __( 'Buscar Categoría' ),
				'all_items'         => __( 'Todas las Categorías' ),
				'parent_item'       => __( 'Categoría Padre' ),
				'parent_item_colon' => __( 'Categoría Padre:' ),
				'edit_item'         => __( 'Editar Categoría' ),
				'update_item'       => __( 'Actualizar Categoría' ),
				'add_new_item'      => __( 'Agregar Categoría' ),
				'menu_name'         => __( 'Categorías' ),
			),
      	 	'hierarchical' => true,
      		'label' => 'Categorias',
      		'query_var' => true,
      		'rewrite' => array('slug' => 'categoria-videos')
    	)
  	);
}
add_action( 'init', 'custom_category_video_init' );

/************************ NUEVOS CAMPOS A CUSTOM POST VIDEOS **********************************
/**
 * Display the metabox
*/
function url_custom_metabox_video() {
	global $post;
	$ec_video_type = get_post_meta( $post->ID, 'ec_video_type', true );
	$ec_video_urllink = get_post_meta( $post->ID, 'ec_video_urllink', true );
	
	if ($ec_video_urllink == ""){
		$ec_video_type = 'youtube';
		$url_video_p="http://youtube.com/watch?v=";
	}else{
		if($ec_video_type=="youtube"){
			$url_video_p="http://youtube.com/watch?v=";
		}
		if($ec_video_type=="vimeo"){
			$url_video_p="http://vimeo.com/";
		}
	}
	
	// output invlid url message and add the http:// to the input field
	if( isset($errors) ) { echo $errors; } ?>     
	    <p class="videourl_wrap">
			<select name="videotype" class="video_type">
			  <option <?php if($ec_video_type=="youtube") echo 'selected="selected"'; ?> value="youtube">YouTube</option>
			  <option <?php if($ec_video_type=="vimeo") echo 'selected="selected"'; ?> value="vimeo">Vimeo</option>
			</select>
			<label for="videourl"><?php echo $url_video_p; ?></label>
			<input id="videourl" type="text" size="26" name="videourl" placeholder="fpAPDlVmvHM" value="<?php if( $ec_video_urllink && $ec_video_urllink!="" ) { echo $ec_video_urllink; } ?>" />
		</p>
	<?php
}

/**
 * Process the custom metabox fields
*/
function save_custom_url_video( $post_id ) {
	global $post;  

	if( isset($_POST['videourl']) || isset($_POST['videotype'])) {
		update_post_meta( $post->ID, 'ec_video_urllink', $_POST['videourl'] );
		update_post_meta( $post->ID, 'ec_video_type', $_POST['videotype'] );
	}
}

// Add action hooks. Without these we are lost
add_action( 'admin_init', 'add_custom_metabox_video' );
add_action( 'save_post', 'save_custom_url_video' );
	 
/**
 * Add meta box
*/
function add_custom_metabox_video() {
	add_meta_box( 
		'custom-metabox_video', //id
		__( 'URL Video' ), //title
		'url_custom_metabox_video', //callback
		'ec_videos', //page or post type
		'normal', //context
		'high' //priority
	);
}

/**
 * Get and return the values for the URL and description
*/
function get_video_url_box() {
	global $post;
	
	$ec_video_urllink = get_post_meta( $post->ID, 'ec_video_urllink', true );
	$ec_video_type = get_post_meta( $post->ID, 'ec_video_type', true );
	
//	return $ec_video_urllink;
	
	if ( $ec_video_type == "youtube" ){
		
		$image_youtube_video = 'http://img.youtube.com/vi/'.$ec_video_urllink.'/0.jpg';
		$image2_youtube_video = 'http://img.youtube.com/vi/'.$ec_video_urllink.'/mqdefault.jpg';
		$embed_youtube_video = '<iframe width="100%" height="360" src="http://www.youtube.com/embed/'.$ec_video_urllink.'" frameborder="0" allowfullscreen></iframe>';
		
		return array( 'image' => $image_youtube_video,
					  'image-medium' => $image2_youtube_video,
					  'embed' => $embed_youtube_video,
					  'code'  => $ec_video_urllink,
					  'error' => 0
					);
					
	} elseif($ec_video_type == "vimeo"){
		
		$data_vimeo = @file_get_contents("http://vimeo.com/api/v2/video/$ec_video_urllink.json");
		//if error
		if ($data_vimeo=="") return array( 'error' => 1 );
		
		$data_vimeo = json_decode($data_vimeo);
		$embed_vimeo_video ='<iframe src="http://player.vimeo.com/video/'.$ec_video_urllink.'?badge=0&amp;color=ffc830" width="100%" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
		
		return array( 'image' => $data_vimeo[0]->thumbnail_large,
					  'image-medium' => $data_vimeo[0]->thumbnail_medium,
					  'embed' => $embed_vimeo_video,
					  'code'  => $ec_video_urllink,
					  'error' => 0
					);					
	}
	
	
	return array( 'error' => 1 );
}

/*********************************************************************************/

/* JS FRONT */
function ec_enqueue_script_front() {
	wp_register_script('ec_front_js',
		get_template_directory_uri() . '/library/js/front_script.js',
		array( 'jquery' ),
		'1.2' );

	wp_enqueue_script('ec_front_js');
}

add_action( 'wp_enqueue_scripts', 'ec_enqueue_script_front' );

/*************** AGREGAR CSS Y JS ADMINISTRADOR *****************/
/**
 * Add js admin post
*/
function ec_enqueue_scripts( $hook ) {

    if( !in_array( $hook, array( 'post.php', 'post-new.php' ) ) )
        return;

    wp_enqueue_script( 
        'ec_admin_color',                           // Handle
        TEMPLATE_URL . '/admin/js/admin_edit.js',  // Path to file
        array( 'jquery' )                           // Dependancies
    );
}
add_action( 'admin_enqueue_scripts', 'ec_enqueue_scripts', 2000 );

function ec_custom_admin_css() {
  echo '<link rel="stylesheet" href="'.TEMPLATE_URL.'/admin/css/admin_edit.css" type="text/css" media="all" />';
}
add_action('admin_head', 'ec_custom_admin_css');

/*************** FIN AGREGAR CSS Y JS ADMINISTRADOR *****************/

/*************** PAGINACION CUSTOM POST TYPES ***************/

function init_custom_posts_per_page($query) {
	
	if ( is_admin() || ! $query->is_main_query() )
        return;
	
	if ( is_post_type_archive( array('ec_applications','ec_videos') ) ){
		
		switch ( $query->query_vars['post_type'] ){
			
	        case 'ec_applications':  // Post Type Aplicaciones
				$query->set( 'posts_per_page', 20 );
	            break;

	        case 'ec_videos':  // Post Type named Videos
	            $query->set( 'posts_per_page', 10 );
	            break;

	        default:
	            break;
	    }
    
		return $query;
	}
	/*
	if( is_tax() ){
		echo "asdad";
	}
	
	if ( is_category() ){
		echo "asdad";
	}
	*/
}

add_filter( 'pre_get_posts', 'init_custom_posts_per_page' );

/*************** FIN PAGINACION CUSTOM POST TYPES ***************/

/* IMPRIMIR TERMINOS CUSTOM TAXONOMIES */
function ec_get_custom_taxonomy($taxonomy){
	$terms = get_the_terms( get_the_ID(), $taxonomy );
	
	if ( $terms && ! is_wp_error( $terms ) ) {
		
		echo '<ul class="' . $taxonomy . '">';
		foreach ( $terms as $term ) {
			echo '<li class="' . $term->slug . ' ' . $term->taxonomy . '-' . $term->term_id . '"><a href="'.get_term_link( $term->slug, $taxonomy ).'">' . $term->name . '</a></li>';
		}
		echo '</ul>';

	}else{
		if(! is_wp_error( $terms ) ) echo " - ";
	}
}
/* FIN IMPRIMIR TERMINOS CUSTOM TAXONOMIES */

/** AGREGAR CUSTOM POST TYPE AL FEED **
// Add a Custom Post Type to a feed
function add_cpt_to_feed( $qv ) {
	if ( isset($qv['feed']) && !isset($qv['post_type']) )
		$qv['post_type'] = array('post', '<CPT>');
	return $qv;
}
add_filter( 'request', 'add_cpt_to_feed' );	
**/	

/* ATENCION: UTILIZAR SIEMPRE QUE SE CREE UN NUEVO TIPO DE POST */
/*
function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );
*/

?>
