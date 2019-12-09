	

	<section class="footer footer__info">
		<div class="footer__container container">

			<div class="footer__col">
				<h3>Каталог</h3>
				<?php 
					wp_nav_menu( array(
						'menu'=>'footer_cat',
						'menu_class'=>'list',
					    'theme_location'=>'menu',
					) );
				?>
			</div>
			
			<div class="footer__col">
				<h3>INFO</h3>
				<?php 
					wp_nav_menu( array(
						'menu'=>'footer_info',
						'menu_class'=>'list',
					    'theme_location'=>'menu',
					) );
				?>
			</div>

			<div class="footer__col">
				<h3>Контакты</h3>
				<ul>
					<?php while( have_rows('tel', 'option') ): the_row(); 
						$tel_url = get_sub_field('tel_url');
						$tel_text = get_sub_field('tel_text');
						?>

						<li><a href="tel:<?php echo $tel_url; ?>"><?php echo $tel_text; ?></a></li>

					<?php endwhile; ?>

					<li><?php the_field('place', 'option'); ?></li>
					<li>
						<a href="<?php the_field('in', 'option'); ?>" class="hover" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/instagram.svg" alt="">
						</a>
					</li>
				</ul>
			</div>

		</div>
	</section>

	<footer class="footer__copy">
		<div class="footer__container container">
			<p>© 2019, Parket Street</p>
			<p><a href="http://flex-design.net/" target="_blank">Created by FLEX design</a></p>
		</div>
	</footer>

	<?php wp_footer(); ?>

</body>
</html>