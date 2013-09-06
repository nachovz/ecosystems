<?php get_header(); ?>

	<?php do_action('slideshow_deploy', '199'); ?>
			
			<?php
					$query = new WP_Query( array(
						//'post_type' => 'ec_videos',
					    'meta_key' => 'post_views_count',
					    'orderby' => 'meta_value_num',
					    'posts_per_page' => 5
					) );
					//query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
?>
					<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
						<div id="vid-<?php the_ID(); ?>" class="video-ind <?php if($count_video == 0) echo 'active'; ?>">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

						</div>
					<?php $count_video = $count_video+1 ?>	
					<?php endwhile; ?>
					<?php endif; ?>		

<!-- MODULO VIDEO CENTRAL -->
			
			<div id="content-video" class="row-fluid">
				<!-- BARRA VIDEOS -->
				<div class="bar span12">
					<span class="bar-line"></span>
					<h4>ÚLTIMOS VIDEOS</h4>
				</div>
				<!-- FIN BARRA -->
				<?php 

				$args_video = array(
				        'post_type' => 'ec_videos',
				        'posts_per_page' => 5,
						'paged' => 1,
				        'post_status' => 'publish',
				        'orderby' => 'date',
				        'order' => 'DESC',
				        );

				$loop = new WP_Query( $args_video );
				$count_video = 0;
				 ?>
				<div class="video-wrap span8 nomargin">
					<?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
						<div id="vid-<?php the_ID(); ?>" class="video-ind <?php if($count_video == 0) echo 'active'; ?>">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

							<?php // get the video info
								$video_info = get_video_url_box();		
								$video_embed = (($video_info['error'] == 0) ? $video_info['embed'] : "No existe el video" );
								echo $video_embed;
							?>
							
						</div>
					<?php $count_video = $count_video+1 ?>	
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="video-list span4">
					<ul>
						<?php $count_video = 0; ?>
						<?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
							
							<li data-id="<?php the_ID(); ?>" class="<?php if($count_video == 0) echo 'active'; ?>">
								
								<?php // get the video info
									$video_info = get_video_url_box();		
									$video_image = (($video_info['error'] == 0) ? $video_info['image-medium'] : 'default' );
									echo '<img width="120" height="90" class="video-list-thumb" src="'.$video_image.'" alt=""/>';
								?>
								
								<h4 class="video-list-title"><?php the_title(); ?></h4>
								<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings(get_the_ID()); endif; ?>
							</li>
							
						<?php $count_video = $count_video+1 ?>	
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>		
				</div>
			</div>

<!-- FIN MODULO VIDEO CENTRAL -->
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">
					<!-- BARRA NOTICIAS -->
					<div class="bar span12">
						<span class="bar-line"></span>
						<h4>NOTICIAS</h4>
					</div>
					<!-- FIN BARRA -->

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>					
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
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
				
					<div class="end-main"></div>
				</div> <!-- end #main -->
				
				<?php get_sidebar( 'sidebar2' ); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>