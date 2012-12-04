			
			</section>
			
			<footer id="site-footer">
				<div class="container">
					<section id="footer-partner">
						<ul class="thumbnails">
							<li class="span4">
								<div class="thumbnail">
									<h4>Realização</h4>
									<a href="http://www.cdi.org.br/" title=""><img src="<?php bloginfo('template_directory'); ?>/img/logos/cdilan.png" alt="" /></a>
									<a href="http://www.cdilan.com.br/" title=""><img src="<?php bloginfo('template_directory'); ?>/img/logos/cdi.png" alt="" /></a>
								</div>
							</li>
							<li class="span8">
								<div class="thumbnail">
									<h4>Patrocínio</h4>
									<a href="http://www.iobconcursos.com/" title=""><img src="<?php bloginfo('template_directory'); ?>/img/logos/iob.png" alt="" /></a>
									<a href="http://www.mercadolivre.com.br/" title=""><img src="<?php bloginfo('template_directory'); ?>/img/logos/mercadolivre.png" alt="" /></a>
									<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/img/logos/dell.png" alt="" /></a>
								</div>
							</li>
							<li class="span4">
								<div class="thumbnail">
									<h4>Apoio</h4>
									<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/img/logos/aacid.png" alt="" /></a>
									<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/img/logos/safernet.png" alt="" /></a>
								</div>
							</li>
							<li class="span8">
								<div class="thumbnail">
									<h4>Patrocínio</h4>
									<a href="http://game.cdilan.com.br/logo-conectalunos-final-2" title=""><img src="<?php bloginfo('template_directory'); ?>/img/logos/conectalunos.png" alt="" /></a>
									<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/img/logos/luz.png" alt="" /></a>
								</div>
							</li>							
					</section>

					<section id="footer-menu">
						<ul class="nav nav-pills pull-right">
							<?php wp_nav_menu(array('theme_location' => 'footermenu', 'container' => false, 'items_wrap' => '%3$s', 'menu_id' => 'top-nav')); ?>
			                <?php if(is_user_logged_in()) : ?>
			                    <li class="logout"><a href="<?php echo wp_logout_url(); ?>" title="Logout" class=>Logout</a></li>
			                <?php endif; ?>
			            </ul>
			        </section>
		        </div>
			</footer>
		<?php wp_footer(); ?>
	</body>
</html>