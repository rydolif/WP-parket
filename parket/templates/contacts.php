<?php
	/**
		* Template name: Контакты
	*/

get_header();
?>
	

	<section class="contacts">
		<div class="container">

			<h2><?php the_title(); ?></h2>

		</div>
	</section>

	<section class="map">

		<div class="map__container container">
			<div class="map__wrap">

				<div class="map__block map__info">
					<p>
						<b>Телефон</b>
						<?php if( have_rows('tel', 'option') ): ?>
							<span>
							<?php while( have_rows('tel', 'option') ): the_row(); 
								$tel_url = get_sub_field('tel_url');
								$tel_text = get_sub_field('tel_text');
								?>

								<a href="tel:<?php echo $tel_url; ?>"><?php echo $tel_text; ?></a>

							<?php endwhile; ?>
							</span>
						<?php endif; ?>
					</p>
					<div>
						<b>Адрес</b>
						<?php the_field('place', 'option'); ?>
					</div>
					<p>
						<b>Social</b>
						<span>
							<a href="<?php the_field('in', 'option'); ?>" class="hover" target="_blank">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/instagram.svg" alt="">
							</a>
						</span>
						
					</p>			
				</div>

				<div class="map__form map__block">
					<?php the_field('contacts_form', 'option'); ?>
				</div>

			</div>
		</div>

		<div class="map__map">
			<?php the_field('map', 'option'); ?>
		</div>
		
	</section>
<?php
get_footer();
