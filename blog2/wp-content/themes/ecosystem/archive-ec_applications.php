<?php get_header(); ?>

<div id="content" class="clearfix row-fluid">
			
	<div id="main" class="span8 clearfix aplicaciones_wrap" role="main">
				
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

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				
				<section class="post_content aplicacion-<?php the_ID(); ?>">
					
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wp-apps-thumb' ); ?></a>
					
					<h4 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
					
					<?php //print_r(get_taxonomies('','names')); ?>
					
					<?php 
					$proveedores = get_the_terms( get_the_ID(), "ec_proveedor" ); 
					if ( $proveedores && ! is_wp_error( $proveedores ) ) {
						
						echo '<ul>';
						foreach ( $proveedores as $proveedor ) {
							echo '<li class="proveedor proveedor-'.$proveedor->term_id.'"><a href="'.get_term_link($proveedor->slug, "ec_proveedor").'">'.$proveedor->name.'</a></li>';
						}
						echo '</ul>';

					}
					if(function_exists("kk_star_ratings")) : echo kk_star_ratings(get_the_ID()); endif;
					?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">ver más</a>
				</section> <!-- end article section -->
					
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
			
				</div> <!-- end #main -->
    
				<?php get_sidebar( 'sidebar3' ); // sidebar 3 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>