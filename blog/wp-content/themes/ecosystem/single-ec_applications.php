<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="bar span12">
							<span class="bar-line"></span>
							<h4><?php echo strtoupper(get_the_title()); ?></h4>
						</div>	
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix single-application'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<?php if ( has_post_thumbnail()) { ?>
								<div class="article-image"><?php the_post_thumbnail( 'wp-apps-featured' ); ?><br />
								<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings(get_the_ID()); endif; ?>
								<br /><a href="<?php echo get_app_url_box(); ?>" TARGET='_blank' class="descargar">DESCARGAR</a>
								</div>
							<?php } ?>
							
							<p class="h2"><?php the_title(); ?></p>
							
							<div class="extra_info">
								<!-- OBTENER CATEGORIAS -->
								<label>Categorías:</label>
								<?php ec_get_custom_taxonomy("ec_category_applications"); ?>
								<br />
								<!-- FIN OBTENER CATEGORIAS -->
						
								<!-- OBTENER PROVEEDOR -->
								<label>Desarrollado por:</label>
								<?php ec_get_custom_taxonomy("ec_proveedor"); ?>
								<br />
								<!-- FIN OBTENER PROVEEDOR -->
							
								<!-- OBTENER SISTEMAS OPERATIVOS -->
								<?php ec_get_custom_taxonomy("ec_sistema_operativo"); ?>
								<br />
								<!-- FIN OBTENER SISTEMAS OPERATIVOS -->
							</div>
							<br />
							<p class="meta"><?php _e("Posted", "bonestheme"); ?> 
							<time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
								<?php the_date(); ?>
							</time> 
							<?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>
						
						</header> <!-- end article header -->
						
						<div class="separator"></div>
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","bonestheme"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php //comments_template('',true); ?>
					
					<?php endwhile; ?>			
					
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
    
				<?php get_sidebar( 'sidebar3' ); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>