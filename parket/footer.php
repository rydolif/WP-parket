	
	
	<div class="wrap">
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
	</div>


	<div class="modal" id="login">

		<button class="modal__close login_close" type="button">
			<span></span>
			<span></span>
		</button>

		<h3>Авторизация</h3>

		<ul>
			<li><a href="#" class="modal__active">Вход</a></li>
			<li><a href="#" class="register_open login_close">Регистрация</a></li>
		</ul>

		<?php echo do_shortcode( '[profilepress-login id="1"]' ); ?>
		<div class="modal__reset"><a href="#" class="login_close reset_open">Забыл пароль!</a></div>

	</div>

	<div class="modal" id="register">

		<button class="modal__close register_close" type="button">
			<span></span>
			<span></span>
		</button>

		<h3>Регистрация</h3>

		<ul>
			<li><a href="#" class="login_open register_close">Вход</a></li>
			<li><a href="#" class="modal__active">Регистрация</a></li>
		</ul>

		<?php echo do_shortcode( '[profilepress-registration id="1"]' ); ?>

	</div>

	<div class="modal" id="reset">

		<button class="modal__close reset_close" type="button">
			<span></span>
			<span></span>
		</button>

		<h3>Забыл пароль!</h3>

		<ul>
			<li><a href="#" class="login_open reset_close register_close">Вход</a></li>
			<li><a href="#" class="register_open reset_close login_close">Регистрация</a></li>
		</ul>

		<?php echo do_shortcode( '[profilepress-password-reset id="1"]' ); ?>

	</div>

	<?php wp_footer(); ?>
</body>
</html>