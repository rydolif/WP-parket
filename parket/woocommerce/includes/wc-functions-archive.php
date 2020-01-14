<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//--------------------------------------------wrap_cart--------------------------------
	add_action( 'woocommerce_before_main_content', 'woocommerce_before_main_content_wrap', 10 );
	function woocommerce_before_main_content_wrap() {
		?>

		<section class="catalog">
			<div class="catalog__container container">

				<div class="grums"><?php woocommerce_breadcrumb(); ?></div>
				
		<?php 
	}

	add_action( 'woocommerce_after_main_content', 'woocommerce_after_main_content_wrap', 20 );
	function woocommerce_after_main_content_wrap() {
		?>
				</div>
		<?php 
	}


//--------------------------------------------wrap_arhive_filter-------------------------------
	add_action( 'woocommerce_before_shop_loop', 'woocommerce_before_shop_loop_wrap', 10 );
	function woocommerce_before_shop_loop_wrap() {
		?>

			<div class="catalog__filter">
				<?php

				if ( is_active_sidebar( 'custom-header-widget' ) ) : ?>
				    <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
						 <?php dynamic_sidebar( 'custom-header-widget' ); ?>
				    </div>
				<?php endif; ?>
			</div>

			<div class="catalog__wrap">

			<div class="shop__description">
				<?php do_action( 'woocommerce_archive_description' ); ?>

				<div class="top_brend">
					<?php dynamic_sidebar( 'top-area' ); ?>
				</div>

			</div>


		<?php 
	}

	add_action( 'woocommerce_after_shop_loop', 'woocommerce_after_shop_loop_wrap', 20 );
	function woocommerce_after_shop_loop_wrap() {
		?>
			</div>
		<?php 
	}


//-------------------------------------------img-slider--------------------------------
	add_action( 'woocommerce_before_shop_loop_item_title', 'school_before_shop_loop_item_title', 5 );
	function school_before_shop_loop_item_title() {
		?>

			<div class="cart__img swiper-container">
				<div class="swiper-wrapper">
		<?php 
	}

	add_action( 'woocommerce_before_shop_loop_item_title', 'school_end_shop_loop_item_title', 20 );
	function school_end_shop_loop_item_title() {
		?>
				</div>
				<div class="cart__next swiper-button-next"><span></span></div>
				<div class="cart__prev swiper-button-prev"><span></span></div>
			</div>

			<div class="cart__block">
				<p>
					<?php 
						$popular = get_field('popular');
						if( $popular ) {
							?>
						    	<span class="cart__block_white"><?php echo $popular; ?></span>
						    <?php 
						}
					?>
					<?php 
						$sale = get_field('sale');
						if( $sale ) {
							?>
						    	<span class="cart__block_sale"><?php echo $sale; ?></span>
						    <?php 
						}
					?>
				</p>
			</div>
		<?php 
	}

	function woocommerce_archive_gallery() {
	 	 
		global $product;
		$post_ids = $product->get_id();
		$product_id = $product->get_id();
		 
		$attachment_ids = $product->get_gallery_image_ids();

		foreach( $attachment_ids as $attachment_id ) {
		  echo '<div class="swiper-slide"><a href="';			  
		  echo $Original_image_url = wp_get_attachment_url( $attachment_id );			  
		  echo '" data-fancybox="';	
		  echo $product_id;	
		  echo '" class="">';
		  echo '<span class="cart__img_plus"><span></span><span></span></span>';
		  echo wp_get_attachment_image( $attachment_id, 'shop');
		  echo '</a></div>';
		}	

	   ?>
	      
	<?php
	}
	 
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ); //Убираем вывод картинки по умолчанию
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_archive_gallery', 8 );


//--------------------------------------------title--------------------------------
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title_wrap', 10 );
	function woocommerce_template_loop_product_title_wrap() {

		?>

			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

		<?php

	}


//--------------------------------------------price--------------------------------
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price_wrap', 10 );
	function woocommerce_template_loop_price_wrap() {

		?>

		<div class="cart__info">

			<?php global $product; if ( $price_html = $product->get_price_html() ) : ?>
				<p><span>Цена: </span><b><?php echo $price_html; ?> /м<sup>2</sup></b></p>
			<?php endif; ?>

		</div>

		<?php

	}


//--------------------------------------------calculation_form--------------------------------
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
	add_action('woocommerce_after_shop_loop_item', 'parket_before_single_product_summary');

	function parket_before_single_product_summary()
	{
		global $product;
			$length = (float) $product->get_attribute('upakovka');
			$val = preg_replace('/[^0-9]\./', '', $length);
			$product_id = $product->get_id();
			$size = $val;
			$area_per_item = $size;

			$regular_price = $product->get_regular_price();
			$sale_price = $product->get_sale_price();

			$product_attributes = $product->get_attributes();
			$visible_attr = [];

		?>
		<form class="cart__form add-to-cart-form" action="">

			<div class="cart__attr">

				<p class="product-attr">
					<?php
						// Получаем элементы таксономии атрибута shoes
						$attribute_names = get_the_terms($product->get_id(), 'pa_klass');
						$attribute_name = "pa_klass";
						if ($attribute_names) {
							// Вывод имени атрибута shoes
							echo '<span class="producrt-attr__label">' . wc_attribute_label($attribute_name) . ': </span>';
							echo '<b class="producrt-attr__name">';
							// Выборка значения заданного атрибута
							foreach ($attribute_names as $attribute_name):
								// Вывод значений атрибута shoes
								echo  $attribute_name->name . ', ' ;
							endforeach;
							echo '</b>';
						}
					?>
				</p>
				
				<p class="product-attr">
					<?php
						// Получаем элементы таксономии атрибута shoes
						$attribute_names = get_the_terms($product->get_id(), 'pa_tolshhina');
						$attribute_name = "pa_tolshhina";
						if ($attribute_names) {
							// Вывод имени атрибута shoes
							echo '<span class="producrt-attr__label">' . wc_attribute_label($attribute_name) . ': </span>';
							echo '<b class="producrt-attr__name">';
							// Выборка значения заданного атрибута
							foreach ($attribute_names as $attribute_name):
								// Вывод значений атрибута shoes
								echo  $attribute_name->name . ', ' ;
							endforeach;
							echo '</b>';
						}
					?>
				</p>

				<p class="product-attr">
					<?php
						// Получаем элементы таксономии атрибута shoes
						$attribute_names = get_the_terms($product->get_id(), 'pa_strana-proizvoditel');
						$attribute_name = "pa_strana-proizvoditel";
						if ($attribute_names) {
							// Вывод имени атрибута shoes
							echo '<span class="producrt-attr__label">' . wc_attribute_label($attribute_name) . ': </span>';
							echo '<b class="producrt-attr__name">';
							// Выборка значения заданного атрибута
							foreach ($attribute_names as $attribute_name):
								// Вывод значений атрибута shoes
								echo  $attribute_name->name . ', ' ;
							endforeach;
							echo '</b>';
						}
					?>
				</p>

				<p class="product-attr">
					<?php
						// Получаем элементы таксономии атрибута shoes
						$attribute_names = get_the_terms($product->get_id(), 'pa_brend');
						$attribute_name = "pa_brend";
						if ($attribute_names) {
							// Вывод имени атрибута shoes
							echo '<span class="producrt-attr__label">' . wc_attribute_label($attribute_name) . ': </span>';
							echo '<b class="producrt-attr__name">';
							// Выборка значения заданного атрибута
							foreach ($attribute_names as $attribute_name):
								// Вывод значений атрибута shoes
								echo  $attribute_name->name . ', ' ;
							endforeach;
							echo '</b>';
						}
					?>
				</p>

			</div>

			<div class="cart__form_block">
				<label>Количество (уп):</label>
				<div class="cart__form_quantity product-qty">
					<input min="1" value="1" class="form-control" type="number" name="quantity">
				</div>
			</div>
			<div class="cart__form_block">
				<label>Площадь покрытия (м<sup>2</sup>)</label>
				<div class="cart__form_quantity product-qty">
					<input min="0" step="<?php echo $size ?>" value="<?php echo $size ?>" class="form-control" type="number" name="area">
				</div>
			</div>

			<div class="cart__price total-price">
				<span class="total-price__label">Стоимость заказа</span>
				<span class="cart__price_green"><b class="total-price__value"><?php echo  $sale_price ? $sale_price : $regular_price ?></b> руб.</span>
			</div>
			<div class="cart__form_add add-to-cart">
				<input type="hidden" value="<?php echo $product_id ?>" name="product_id">
				<input type="hidden" value="<?php echo $regular_price ?>" name="price">
				<input type="hidden" value="<?php echo $sale_price ?>" name="sale_price">
				<input type="hidden" value="<?php echo $area_per_item ?>" name="area_per_item">
					<button type="button" class="btn btn--cart single_add_to_cart_button button alt">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 486.569 486.569" style="enable-background:new 0 0 486.569 486.569;" xml:space="preserve">
							<path d="M146.069,320.369h268.1c30.4,0,55.2-24.8,55.2-55.2v-112.8c0-0.1,0-0.3,0-0.4c0-0.3,0-0.5,0-0.8c0-0.2,0-0.4-0.1-0.6c0-0.2-0.1-0.5-0.1-0.7s-0.1-0.4-0.1-0.6c-0.1-0.2-0.1-0.4-0.2-0.7c-0.1-0.2-0.1-0.4-0.2-0.6c-0.1-0.2-0.1-0.4-0.2-0.6c-0.1-0.2-0.2-0.4-0.3-0.7c-0.1-0.2-0.2-0.4-0.3-0.5c-0.1-0.2-0.2-0.4-0.3-0.6c-0.1-0.2-0.2-0.3-0.3-0.5c-0.1-0.2-0.3-0.4-0.4-0.6c-0.1-0.2-0.2-0.3-0.4-0.5c-0.1-0.2-0.3-0.3-0.4-0.5s-0.3-0.3-0.4-0.5s-0.3-0.3-0.4-0.4c-0.2-0.2-0.3-0.3-0.5-0.5c-0.2-0.1-0.3-0.3-0.5-0.4c-0.2-0.1-0.4-0.3-0.6-0.4c-0.2-0.1-0.3-0.2-0.5-0.3s-0.4-0.2-0.6-0.4c-0.2-0.1-0.4-0.2-0.6-0.3s-0.4-0.2-0.6-0.3s-0.4-0.2-0.6-0.3s-0.4-0.1-0.6-0.2c-0.2-0.1-0.5-0.2-0.7-0.2s-0.4-0.1-0.5-0.1c-0.3-0.1-0.5-0.1-0.8-0.1c-0.1,0-0.2-0.1-0.4-0.1l-339.8-46.9v-47.4c0-0.5,0-1-0.1-1.4c0-0.1,0-0.2-0.1-0.4c0-0.3-0.1-0.6-0.1-0.9c-0.1-0.3-0.1-0.5-0.2-0.8c0-0.2-0.1-0.3-0.1-0.5c-0.1-0.3-0.2-0.6-0.3-0.9c0-0.1-0.1-0.3-0.1-0.4c-0.1-0.3-0.2-0.5-0.4-0.8c-0.1-0.1-0.1-0.3-0.2-0.4c-0.1-0.2-0.2-0.4-0.4-0.6c-0.1-0.2-0.2-0.3-0.3-0.5s-0.2-0.3-0.3-0.5s-0.3-0.4-0.4-0.6c-0.1-0.1-0.2-0.2-0.3-0.3c-0.2-0.2-0.4-0.4-0.6-0.6c-0.1-0.1-0.2-0.2-0.3-0.3c-0.2-0.2-0.4-0.4-0.7-0.6c-0.1-0.1-0.3-0.2-0.4-0.3c-0.2-0.2-0.4-0.3-0.6-0.5c-0.3-0.2-0.6-0.4-0.8-0.5c-0.1-0.1-0.2-0.1-0.3-0.2c-0.4-0.2-0.9-0.4-1.3-0.6l-73.7-31c-6.9-2.9-14.8,0.3-17.7,7.2s0.3,14.8,7.2,17.7l65.4,27.6v61.2v9.7v74.4v66.5v84c0,28,21,51.2,48.1,54.7c-4.9,8.2-7.8,17.8-7.8,28c0,30.1,24.5,54.5,54.5,54.5s54.5-24.5,54.5-54.5c0-10-2.7-19.5-7.5-27.5h121.4c-4.8,8.1-7.5,17.5-7.5,27.5c0,30.1,24.5,54.5,54.5,54.5s54.5-24.5,54.5-54.5s-24.5-54.5-54.5-54.5h-255c-15.6,0-28.2-12.7-28.2-28.2v-36.6C126.069,317.569,135.769,320.369,146.069,320.369z M213.269,431.969c0,15.2-12.4,27.5-27.5,27.5s-27.5-12.4-27.5-27.5s12.4-27.5,27.5-27.5S213.269,416.769,213.269,431.969z M428.669,431.969c0,15.2-12.4,27.5-27.5,27.5s-27.5-12.4-27.5-27.5s12.4-27.5,27.5-27.5S428.669,416.769,428.669,431.969z M414.169,293.369h-268.1c-15.6,0-28.2-12.7-28.2-28.2v-66.5v-74.4v-5l324.5,44.7v101.1C442.369,280.769,429.669,293.369,414.169,293.369z"/>
						</svg>
						В корзину
					</button>
			</div>
		</form>
	<?php

	}


//--------------------------------------------archive_description IMG--------------------------------

	// add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
	// 	function woocommerce_category_image() {
	// 		if ( is_product_category() ){
	// 		global $wp_query;
	// 		$cat = $wp_query->get_queried_object();
	// 		$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
	// 		$image = wp_get_attachment_url( $thumbnail_id );
	// 		if ( $image ) {
	// 			echo '<img class="category-product-image" src="' . $image . '" alt="'.$cat->name.'" />';
	// 		}
	// 	}
	// }
