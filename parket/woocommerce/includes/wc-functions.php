<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//---------------------------------------------breadcrumb-----------------------------------------------
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb',  20 );



//---------------------------------------------title product-----------------------------------------------
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title',  5 );

add_action( 'woocommerce_single_product_summary', 'single_title',  5 );
	
function single_title() {
	if ( ! is_archive() ) {
?>
	<h1>
		<?php the_title(); ?>
	</h1>

<?php
	}
}
