			<!-- <div class="push"></div> -->
						
			<footer id="footer" class="container-fluid dark-bg section-text">
				<div class="contain">
			    <div class="row">
				    
				    
				    <div class="col-xs-12 col-sm-6">
					    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-pages', 'menu_class' => 'footer-nav', 'container' => false ) ); ?>
					    <div class="clearfix"></div>
					    <div class="address-wrap">
						    <h2>Get in touch</h2>
						    <p>
						    	<span>StudioViq </span><br />
							    Eerste Hugo de Grootstraat 54-1 <br />
							    1052 KT Amsterdam
						    </p>
						    <p>
						    	<span>Telefoon</span><br />
							    06-4198 6566 
						    </p>
						    
						    <p>
						    	<span>E-mail</span><br />
						    	info@studioviq.nl 
						    </p>
					    </div>
					    
				    </div> 
				    
				    <div class="col-xs-12 col-sm-6 text-right">
						  <div class="social-news">
						    <h2>Volg ons op</h2>
						    <ul>
						    	<li><a title="Bekijk onze Facebook pagina!" class="icon fb-icon" target="_blank" href="https://www.facebook.com/studioviq"><span></span></a></li>
						    	<li><a title="Volg ons op Twitter!" class="icon tw-icon" target="_blank" href="https://twitter.com/studioviq"><span></span></a></li>
						    	<li><a title="Let's connect!" class="icon li-icon" target="_blank" href="https://www.linkedin.com/in/victorlabigar"><span></span></a></li>
						    </ul>
					    </div>
				    </div> <!-- end col -->
				    
				    <div class="col-xs-12 text-right">
					    <div class="copyright">
			    			<span>©<?php echo the_date('Y')?> StudioViq</span> 
			    			<a class="spaced" href="/algemene-voorwaarden">Algemene voorwaarden</a>  
			    			<a class="spaced" href="/site-map">Sitemap</a>
		    			</div>
				    </div>
				    
				    
			    </div>
			    
			    <div class="clearfix"></div>
				</div>  
			</footer>
		</div> <!-- end .content -->

		<?php wp_footer(); ?>
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-51396428-1', 'studioviq.nl');
		  ga('require', 'displayfeatures');
		  ga('send', 'pageview');
		
		</script>
		
  </body>
</html>