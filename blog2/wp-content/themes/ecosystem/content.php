<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
  
  <header>
  
    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="article-image"><?php the_post_thumbnail( 'wpbs-featured-small' ); ?></a>
    
    <p class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
    
    <p class="meta"><?php _e("Posted", "bonestheme"); ?> 
	<time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
		<strong><?php the_date(); ?></strong>
	</time> 
	<?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>
	
	<p class="category-list">
	<?php
	// get the category IDs assigned to post
	$categories = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
	// separator between links
	$separator = ' ';

	if ( $categories ) {

		$cat_ids = implode( ',' , $categories );
		$cats = wp_list_categories( 'title_li=&style=none&echo=0&include=' . $cat_ids );
		$cats = rtrim( trim( str_replace( '<br />',  $separator, $cats ) ), $separator );

		// display post categories
		echo  $cats;
	}
	?>
	</p>
  
  </header> <!-- end article header -->

  <section class="post_content clearfix">
    <?php the_content( __("Read more &raquo;","bonestheme") ); ?>
  </section> <!-- end article section -->
  
  <footer>

    <p class="tags"><?php the_tags('<span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', ''); ?></p>
    
  </footer> <!-- end article footer -->

  <div class="separator"></div>

</article> <!-- end article -->