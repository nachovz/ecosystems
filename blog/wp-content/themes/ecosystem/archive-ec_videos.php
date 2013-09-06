<?php get_header(); ?>
			
		<div id="content" class="clearfix row-fluid">
			
			<div id="main" class="span8 clearfix" role="main">
					
					<!-- BARRA PRINCIPAL -->
					<div class="bar span12">
						<span class="bar-line"></span>
						<h4><?php echo strtoupper(post_type_archive_title("", false)); ?></h4>
					</div>
					<!-- FIN BARRA PRINCIPAL -->
				
					<div class="page-header">
					<?php if (is_category()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts Categorized:", "bonestheme"); ?></span> <?php single_cat_title(); ?>
						</h1>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php get_the_author_meta('display_name'); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Monthly Archives:", "bonestheme"); ?>:</span> <?php the_time('F Y'); ?>
					    </h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Yearly Archives:", "bonestheme"); ?>:</span> <?php the_time('Y'); ?>
					    </h1>
					<?php } ?>
					</div>
				
				<div class="videos_wrap">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					
						<section class="post_content">
							
							<?php // get the video info
								$video_info = get_video_url_box();		
								$video_image = (($video_info['error'] == 0) ? $video_info['image'] : 'default' );
							?>
							
							<a href="<?php the_permalink() ?>" class="video-img-wrap" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php //the_post_thumbnail( 'wpbs-featured' );
								echo '<img src="'.$video_image.'" alt="" class="video-img-p"/>';
							 ?>
							<img src="<?php echo TEMPLATE_URL; ?>/images/play.png" alt="" class="video-arrow" />
							</a>
							
							<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php echo the_time('j/m/Y'); ?></time></p><br />
							
							<p class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
						
							<?php the_excerpt(); ?>
					
						</section> <!-- end article section -->
					
						<div class="separator"></div>	
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
				</div>	<!-- end #videos wrap -->
				
				<div class="end-main"></div>
			</div> <!-- end #main -->
    
			<?php get_sidebar(); // sidebar 1 ?>
    
		</div> <!-- end #content -->

<?php get_footer(); ?>