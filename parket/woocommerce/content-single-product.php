<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'tovar', $product ); ?>>

	<h1><?php the_title(); ?></h1>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="tovar__attr">

		<?php

			$product_attributes = $product->get_attributes();
			$visible_attr = [];

			foreach ($product_attributes as $attribute) {
				if ($attribute->get_visible() && ($attribute['variation'] !== true)) {
					array_push($visible_attr, $attribute);
				}
			}

			foreach ($visible_attr as $product_attribute_key => $product_attribute) :
		?>

			<p class="product-attr <?php echo esc_attr($product_attribute['name']); ?>">
				<span class="producrt-attr__label"><?php echo wp_kses_post(wc_attribute_label($product_attribute['name'])); ?>: </span>
				<b class="producrt-attr__name"><?php echo wp_kses_post($product->get_attribute($product_attribute['name'])); ?></b>
			</p>

		<?php
			endforeach;
		?>

	</div>

	<div class="tovar__calculation">
		<?php 
				$length = (float) $product->get_attribute('upakovka');
				$val = preg_replace('/[^0-9]\./', '', $length);
				$product_id = $product->get_id();
				$size = $val;
				$area_per_item = $size;

				$regular_price = $product->get_regular_price();
				$sale_price = $product->get_sale_price();

			?>
			<form class="cart__form add-to-cart-form" action="">

				<div class="tovar__calculation_wrap">
					<div class="cart__form_block">
						<label>Количество (уп):</label>
						<div class="cart__form_quantity product-qty">
							<input min="1" value="1" class="form-control" type="number" name="quantity">
						</div>
					</div>
					<div class="cart__form_block">
						<label>Площадь покрытия (м<sup>2</sup>)</label>
						<div class="cart__form_quantity product-qty">
							<input min="0" step="0.1" value="<?php echo $size ?>" class="form-control" type="number" name="area">
						</div>
					</div>

					<div class="total-price">
						<span class="total-price__label">Цена:</span>
						<span class="cart__price_green"><b class="total-price__value"><?php echo  $sale_price ? $sale_price : $regular_price ?></b> руб.</span>
					</div>
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
	</div>

	<div class="cart__tabs tabs">

		<ul class="tabs__list">
			<li><a href="#one" class="tabs__link">Описание</a></li>
			<li><a href="#two" class="tabs__link">Доставка</a></li>
			<li><a href="#three" class="tabs__link">Оплата</a></li>
			<li><a href="#four" class="tabs__link">Возврат</a></li>
		</ul>

		<div id="one" class="tabs__wrap">
			<?php the_content(); ?>
		</div>

		<div id="two" class="tabs__wrap">
			<?php the_field('delivery'); ?>
		</div>

		<div id="three" class="tabs__wrap">
			<?php the_field('payment'); ?>
		</div>

		<div id="four" class="tabs__wrap">
			<?php the_field('return'); ?>
		</div>

	</div>
	
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>



</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
