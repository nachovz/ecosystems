		<!-- widget footer -->
		<div id="twitter-wrap" class="clearfix row-fluid">
			<img class="tw-img" src="<?php echo TEMPLATE_URL; ?>/images/twitter_box.png" />
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
            <?php endif; ?>
		</div>
			
			<footer role="contentinfo">
			
				<div id="inner-footer" class="footer-wrap clearfix">
					
		          <span class="bar-line"></span>
		
		          <div id="widget-footer" class="clearfix row-fluid">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
		          </div>
					
					<nav class="clearfix">
						<?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
					
					<p class="geeks pull-right"><a href="http://www.4geeks.co/diseno-paginas-web" title="Diseño y programación"><img src="<?php echo TEMPLATE_URL; ?>/images/logo_4geeks.png" alt="Diseño y programación"/></a></p>
			
					<p class="attribution">&copy; Tiendas Ecosystems - Todos los derechos reservados</p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>