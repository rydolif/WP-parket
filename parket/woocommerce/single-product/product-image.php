<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

?>

	<div class="tovar__slider">

		<div class="tovar__img cart__img swiper-container">
			<div class="swiper-wrapper">

			<?php
				$post_ids = $product->get_id();
				$product_id = $product->get_id();
				 
				$attachment_ids = $product->get_gallery_image_ids();

				foreach( $attachment_ids as $attachment_id ) {
				  
				  echo '<a href="';
				  echo $Original_image_url = wp_get_attachment_url( $attachment_id );
				  echo '" data-fancybox="';
				  echo $product_id;
				  echo '" class="swiper-slide">';
				  echo '<span class="cart__img_plus"><img src="';
				  echo get_template_directory_uri();
				  echo '/assets/img/header__search.png" alt=""></span>';
				  echo wp_get_attachment_image( $attachment_id, 'shop swiper-lazy' );
				  echo '</a>';  
				}
			?>

			</div>
			<div class="cart__next swiper-button-next"><span></span></div>
			<div class="cart__prev swiper-button-prev"><span></span></div>
		</div>

		<div class="tovar__previews swiper-container">
			<div class="swiper-wrapper">
				<?php
					$post_ids = $product->get_id();
					$product_id = $product->get_id();
					 
					$attachment_ids = $product->get_gallery_image_ids();

					foreach( $attachment_ids as $attachment_id ) {
					  
					  echo '<div class="swiper-slide">';
					  echo wp_get_attachment_image( $attachment_id, 'shop' );
					  echo '</div>';  
					}
				?>

			</div>
		</div>

	</div>
