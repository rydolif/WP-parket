<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<title><?php wp_title("", true); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="<?php the_field('favicon', 'option'); ?>">
	<meta name="theme-color" content="#000">

</head>

<?php wp_head(); ?>

<body>

	<header class="header">
		<div class="header__container container">

			<button class="hamburger" type="button">
				<span class="hamburger__box">
					<span class="hamburger__item"></span>
				</span>
			</button>

			<div class="header__tel">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/telephone.svg" alt="">
				<?php if (have_rows('tel', 'option')) : ?>
					<p>
						<?php while (have_rows('tel', 'option')) : the_row();
							$tel_url = get_sub_field('tel_url');
							$tel_text = get_sub_field('tel_text');
						?>

							<a href="tel:<?php echo $tel_url; ?>"><?php echo $tel_text; ?></a>

						<?php endwhile; ?>
					</p>
				<?php endif; ?>
			</div>

			<a href="<?php the_field('in', 'option'); ?>" class="header__in hover" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/instagram.svg" alt="">
			</a>

			<div class="header__block">

				<div class="header__time">
					<?php the_field('time', 'option'); ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/clock.svg" alt="">
				</div>

				<a href="<?php echo get_home_url(); ?>" class="header__logo">
					<img src="<?php the_field('logo', 'option'); ?>" alt="">
				</a>

				<a href="<?php echo get_home_url(); ?>/kontakty/" class="header__place">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/maps-and-flags2.svg" alt="">
					<?php the_field('place', 'option'); ?>
				</a>

			</div>

			<div class="header__info">
				<div class="header__search hover">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/magnifying-glass.svg" alt="">
					<div class="header__search_form">
						<?php if (function_exists('aws_get_search_form')) {
							aws_get_search_form();
						} ?>
					</div>
				</div>
				<div class="header__profile hover">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/user.svg" alt="">
					<?php
					wp_nav_menu(array(
						'menu' => 'login',
						'menu_class' => 'login',
						'theme_location' => 'menu',
					));
					?>
				</div>

				<div class="header__like">
					<?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>
					<?php echo do_shortcode('[ti_wishlistsview]'); ?>
				</div>


				<div class="header__cart">
					<?php cart_link(); ?><?php the_widget('WC_Widget_Cart', 'title='); ?>
				</div>

			</div>

		</div>
	</header>

	<nav class="nav">
		<div class="container">

			<?php
			wp_nav_menu(array(
				'menu' => 'menu',
				'menu_class' => 'list',
				'theme_location' => 'menu',
			));
			?>

			<div class="nav__media header__tel">
				<?php if (have_rows('tel', 'option')) : ?>
					<p>
						<?php while (have_rows('tel', 'option')) : the_row();
							$tel_url = get_sub_field('tel_url');
							$tel_text = get_sub_field('tel_text');
						?>

							<a href="tel:<?php echo $tel_url; ?>"><?php echo $tel_text; ?></a>

						<?php endwhile; ?>
					</p>
				<?php endif; ?>
			</div>

			<div class="nav__media header__time">
				<?php the_field('time', 'option'); ?>
			</div>

			<div class="nav__media header__place">
				<?php the_field('place', 'option'); ?>
			</div>

		</div>
	</nav>

