<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>


	<?php if( have_rows('related') ): ?>

		<section class="related product_attribute">

			<div class="related__title">
				<h2>К этому товару подойдет</h2>
				<div class="attribute__prev swiper-button-prev"><span></span></div>
				<div class="attribute__next swiper-button-next"><span></span></div>
			</div>

			<div class="attribute__slider swiper-container">
				<div class="swiper-wrapper">

				<?php while( have_rows('related') ): the_row(); 
					$id = get_sub_field('id');
				?>

					<div class="swiper-slide">
						<?php
							echo do_shortcode( '[product id="$id"]' );
						?>
					</div>

				<?php endwhile; ?>

				</div>
			</div>

		</section>

	<?php endif; ?>

	<section class="related products">

		<div class="related__title">
			<h2>Вам также могут понравиться</h2>
			<div class="related__prev swiper-button-prev"><span></span></div>
			<div class="related__next swiper-button-next"><span></span></div>
		</div>
		
		<?php woocommerce_product_loop_start(); ?>

		<div class="related__slider swiper-container">
			<div class="swiper-wrapper">

				<?php foreach ( $related_products as $related_product ) : ?>

					<div class="swiper-slide">

					<?php
					 	$post_object = get_post( $related_product->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object );

						wc_get_template_part( 'content', 'product' ); 
					?>

					</div>

				<?php endforeach; ?>

			</div>
		</div>

		<?php woocommerce_product_loop_end(); ?>

	</section>


<?php endif;

wp_reset_postdata();
