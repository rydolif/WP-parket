<?php
	/**
		* Template name: Главная
	*/

get_header();
?>

    <script type="text/javascript">

      (function(){ 

        document.onreadystatechange = () => {

          if (document.readyState === 'complete') {
                    
            /**
             * Setup your Lazy Line element.
             * see README file for more settings
             */

            let el = document.querySelector('#LOGO');
            let myAnimation = new LazyLinePainter(el, {"ease":"easeLinear","strokeWidth":5.1,"strokeOpacity":1,"strokeColor":"#222F3D","strokeCap":"square","reverse":true}); 
            myAnimation.paint(); 
          }
        }

      })();
    </script>

	<div class="preloader">
		<svg id="LOGO" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1186.13 295.13" data-llp-composed="true" class="lazy-line-painter"><defs><style>.cls-1{fill:#238e00;}</style></defs><title>LOGO</title><path d="M44.59,12.25q13.6,0,23.5,3.19a44.74,44.74,0,0,1,16.29,8.9,35,35,0,0,1,9.45,13.55A46.63,46.63,0,0,1,96.88,55a48.47,48.47,0,0,1-3.19,17.89,36.56,36.56,0,0,1-9.67,14,45,45,0,0,1-16.34,9.08,74.08,74.08,0,0,1-23.09,3.24H27.25v45.54H-.13V12.25Zm0,65.89q12.87,0,18.85-6.21t6-17a25.69,25.69,0,0,0-1.51-9A18,18,0,0,0,63.34,39a20.57,20.57,0,0,0-7.71-4.43,35,35,0,0,0-11-1.55H27.25V78.14Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-0" data-llp-duration="210" data-llp-delay="0" fill-opacity="0" style=""/><path d="M221,144.67H199.73a9.35,9.35,0,0,1-5.79-1.69,10.21,10.21,0,0,1-3.33-4.33l-8.94-25.28H128.92L120,138.65a10.42,10.42,0,0,1-3.19,4.15,8.77,8.77,0,0,1-5.75,1.87H89.58L141.33,12.25h28ZM175,94.38,160.67,53.86q-1.28-3.19-2.69-7.48t-2.69-9.31q-1.28,5.11-2.69,9.45T149.91,54L135.67,94.38Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-1" data-llp-duration="210" data-llp-delay="210" fill-opacity="0" style=""/><path d="M338.81,144.67H314.08q-6.94,0-10-5.29L278.86,98.77a10.67,10.67,0,0,0-3.42-3.47,11.13,11.13,0,0,0-5.52-1.1H260.6v50.47H233.23V12.25h41.61q13.87,0,23.73,2.87a45.62,45.62,0,0,1,16.15,8,30.6,30.6,0,0,1,9.22,12.18,40.4,40.4,0,0,1,2.92,15.56A40.92,40.92,0,0,1,325,63.31,36.74,36.74,0,0,1,319.56,74a39.12,39.12,0,0,1-8.76,8.58,45.26,45.26,0,0,1-11.86,6,26.51,26.51,0,0,1,4.93,3.51A24.18,24.18,0,0,1,308,97ZM274.66,74.95a35,35,0,0,0,11.5-1.69,21.6,21.6,0,0,0,7.94-4.65,18.09,18.09,0,0,0,4.56-7,25.47,25.47,0,0,0,1.46-8.76q0-9.4-6.25-14.6t-19-5.2H260.6V74.95Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-2" data-llp-duration="210" data-llp-delay="420" fill-opacity="0" style=""/><path d="M379.15,66.92h5.38q6.75,0,9.76-4.2l33.49-44.81a13.2,13.2,0,0,1,5.2-4.43,17.36,17.36,0,0,1,6.94-1.23h23.73l-42.16,54.3A26.76,26.76,0,0,1,413,74.12a22.42,22.42,0,0,1,5.75,3.33,26.35,26.35,0,0,1,4.93,5.43l43.26,61.78H442.58a19.43,19.43,0,0,1-4.06-.37,12.44,12.44,0,0,1-3-1,7.77,7.77,0,0,1-2.19-1.6,14.89,14.89,0,0,1-1.73-2.24l-34-47.64a10,10,0,0,0-4.11-3.51,17,17,0,0,0-6.66-1h-7.67v57.4H351.77V12.25h27.38Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-3" data-llp-duration="210" data-llp-delay="630" fill-opacity="0" style=""/><path d="M506.18,33.7v34h44.17V88.45H506.18v34.77h56.76v21.45H478.62V12.25h84.32V33.7Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-4" data-llp-duration="210" data-llp-delay="840" fill-opacity="0" style=""/><path d="M869.78,280.17H845q-6.94,0-10-5.29l-25.19-40.61a10.67,10.67,0,0,0-3.42-3.47,11.14,11.14,0,0,0-5.52-1.1h-9.31v50.47H764.18V147.74H805.8q13.87,0,23.73,2.88a45.62,45.62,0,0,1,16.15,8,30.61,30.61,0,0,1,9.22,12.18,40.4,40.4,0,0,1,2.92,15.56A40.92,40.92,0,0,1,856,198.8a36.74,36.74,0,0,1-5.43,10.72,39.11,39.11,0,0,1-8.76,8.58,45.26,45.26,0,0,1-11.86,6,26.47,26.47,0,0,1,4.93,3.51,24.19,24.19,0,0,1,4.11,4.88Zm-64.16-69.73a35,35,0,0,0,11.5-1.69,21.6,21.6,0,0,0,7.94-4.65,18.07,18.07,0,0,0,4.56-7,25.47,25.47,0,0,0,1.46-8.76q0-9.4-6.25-14.6t-19-5.2H791.56v41.89Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-5" data-llp-duration="210" data-llp-delay="1050" fill-opacity="0" style=""/><path d="M910.3,169.19v34h44.17v20.72H910.3v34.77h56.77v21.45H882.73V147.74h84.33v21.45Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-6" data-llp-duration="210" data-llp-delay="1260" fill-opacity="0" style=""/><path d="M1015.06,169.19v34h44.17v20.72h-44.17v34.77h56.77v21.45H987.5V147.74h84.33v21.45Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-7" data-llp-duration="210" data-llp-delay="1470" fill-opacity="0" style=""/><path d="M1186,169.83h-38.7V280.17h-27.47V169.83h-38.7V147.74H1186Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-8" data-llp-duration="210" data-llp-delay="1680" fill-opacity="0" style=""/><path d="M620.24,173.11a10.41,10.41,0,0,1-2.6,3.06,5.7,5.7,0,0,1-3.42,1,8.44,8.44,0,0,1-4.33-1.41q-2.33-1.41-5.43-3.06a52.78,52.78,0,0,0-7.12-3.06,28.3,28.3,0,0,0-9.4-1.41q-9.49,0-14.24,4.24A14.17,14.17,0,0,0,569,183.52a10.4,10.4,0,0,0,2.6,7.26,22.6,22.6,0,0,0,6.84,5,63.46,63.46,0,0,0,9.63,3.74q5.38,1.64,11,3.6a97.68,97.68,0,0,1,11,4.61,38.89,38.89,0,0,1,9.63,6.66,30.53,30.53,0,0,1,6.84,9.81,34.33,34.33,0,0,1,2.6,14.1A45.28,45.28,0,0,1,626,255.2,40.16,40.16,0,0,1,617,269a42,42,0,0,1-14.65,9.26,54.37,54.37,0,0,1-19.76,3.38A62.53,62.53,0,0,1,570,280.35a72.31,72.31,0,0,1-12-3.56,66.26,66.26,0,0,1-10.91-5.48,47.84,47.84,0,0,1-8.94-7.12l8-13a8.13,8.13,0,0,1,2.65-2.42,6.78,6.78,0,0,1,3.47-1,9.47,9.47,0,0,1,5.2,1.83q2.74,1.83,6.3,4a50.88,50.88,0,0,0,8.26,4,31.13,31.13,0,0,0,11.27,1.83q9.58,0,14.83-4.38t5.25-13.05a12.23,12.23,0,0,0-2.6-8.12,21,21,0,0,0-6.8-5.2,53.93,53.93,0,0,0-9.58-3.6q-5.39-1.51-11-3.33a90.37,90.37,0,0,1-11-4.38,34.12,34.12,0,0,1-9.58-6.75,32,32,0,0,1-6.8-10.4q-2.6-6.21-2.6-15.42a36.64,36.64,0,0,1,11.5-26.65,42.93,42.93,0,0,1,13.92-8.67,51,51,0,0,1,18.94-3.29,64.38,64.38,0,0,1,22.13,3.7A49.64,49.64,0,0,1,627,160.24Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-9" data-llp-duration="210" data-llp-delay="1890" fill-opacity="0" style=""/><path class="cls-1" d="M810.61,49.29H724.36V295.2H663.14V49.29H576.9V.07H810.61Z" transform="translate(0.13 -0.07)" data-llp-id="LOGO-10" data-llp-duration="210" data-llp-delay="2100" fill-opacity="0" style=""/></svg>
	</div>

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
				<a href="<?php echo get_home_url(); ?>/shop/" class="btn btn--cart">Еще</a>
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
