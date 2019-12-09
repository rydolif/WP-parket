<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//---------------------------------------------wrapper-----------------------------------------------

	add_action( 'woocommerce_before_main_content', 'new_before_main_content',  10 );
		
	function new_before_main_content() {
	?>

		<main class="main">

			<div class="container">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/header-bg.png" alt="" class="main__bg">
			</div>

			<section class="shop" id="app">
				<div class="container">
	<?php
	}


	add_action( 'woocommerce_after_main_content', 'new_after_main_content',  10 );
		
	function new_after_main_content() {
	?>

				</div>
			</section>

			<div class="container">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-bg.png" alt="" class="main__bg">
			</div>

		</main>
	<?php
	}
