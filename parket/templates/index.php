<?php
	/**
		* Template name: Главная
	*/

get_header();
?>

	<div class="hero">
		<div class="container">
			
			<h1>Уют дома <br><span>начинается с пола</span></h1>
			<p>Закажи свой идеальный пол в PARKET STREET</p>
			<a href="<?php echo get_home_url(); ?>/shop/" class="btn btn--red">Выбрать</a>

		</div>
	</div>

	<section class="tabs">
		<div class="container">
			
			<ul class="tabs__list">
				<li><a href="#one" class="tabs__link">Рекомендуем</a></li>
				<li><a href="#two" class="tabs__link">Популярное</a></li>
			</ul>

			<div id="one" class="tabs__wrap">

				<?php echo do_shortcode('[products limit="12" columns="3" visibility="featured" ]'); ?>

			</div>

			<div id="two" class="tabs__wrap">

				<?php echo do_shortcode('[best_selling_products per_page="12"]'); ?>

			</div>

			<div class="tabs__btn">
				<a href="#" class="btn btn--cart login_open">Еще</a>
			</div>

		</div>
	</section>

	<section class="street">
		<div class="container">

			<h2>Parket street - это</h2>

			<div class="street__wrap">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/street__cat.png" alt="" class="street__cat">

				<div class="street__item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/street__item1.png" alt="">
					<h3><span>Доставка в</span> <br>удобное <br>для Вас время</h3>
				</div>
				<div class="street__item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/street__item2.png" alt="">
					<h3>Доступные цены <span><br>и <br>отличное качество</span></h3>
				</div>
				<div class="street__item street__item--green">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/street__item3.png" alt="">
					<h3>Бессплатный <br> шеф -монтаж <br> <span>напольного покрытия</span></h3>
				</div>

			</div>
			
		</div>
	</section>

	<section class="info">
		<div class="info__container container">
			
			<div class="info__form form">
				<?php the_field('form'); ?>
			</div>

			<div class="info__content">
				<?php the_field('form_content'); ?>
			</div>

		</div>
	</section>
<?php
get_footer();
