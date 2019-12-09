<?php
	/**
		* Template name: checkout
	*/

get_header();
?>

<main class="main">
	<section class="order">
		<div class="container">
			<div class="order__registration order__basket">
				
				<div class="order__registration_text">
					<h2>Оформление заказа</h2>

					<p>
						Наш курьер доставит заказ по указанному Вами адресу .В день доставки курьер свяжется с Вами ориентировочно за 30-40 минут для предупреждения о выезде по адресу доставки. 
					</p>

					<p>
						<b>Стоимость доставки: </b>
					</p>

					<ul>
						<li>Доставка до 2000 - 350 руб</li>
						<li>Доставка до 4000 - 200 руб</li>
						<li>Доставка до 6000 - 100 руб</li>
						<li>Доставка от 6 000 руб. - <span>БЕССПЛАТНО!</span></li>
					</ul>

					<p>
						Закажи на сумму от 6000 рублей и выберете <span>в подарок любимый фрукт</span> (манго, маракуйя,мангостин, лонган, черимойя, рамбутан, карамбола, гуава)!
						<br>
						Подробности у нашего оператора!
					</p>
				</div>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
	</section>

</main>


<?php
get_footer();
