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
		<?php 
	}



	function woocommerce_archive_gallery() {
	 
	global $product;
	$post_ids = $product->get_id();
	 
	$attachment_ids = $product->get_gallery_image_ids();


	foreach( $attachment_ids as $attachment_id ) {
	  
	  echo '<a href="';
	  echo $Original_image_url = wp_get_attachment_url( $attachment_id );
	  echo '" data-fancybox="';
	  echo $attachment_id;
	  echo '" class="swiper-slide">';
	  echo '<span class="cart__img_plus"><span></span><span></span></span>';
	  echo wp_get_attachment_image( $attachment_id, 'shop' );
	  echo '</a>';  
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

