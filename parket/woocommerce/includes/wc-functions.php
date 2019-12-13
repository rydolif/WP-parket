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


function woocommerce_breadcrumb( $args = array() ) {
  $args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
    'delimiter'   => ' &#8250; ',
    'wrap_before' => '',
    'wrap_after'  => '',
    'before'      => '',
    'after'       => '',
    'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
  ) ) );

  $breadcrumbs = new WC_Breadcrumb();

  if ( ! empty( $args['home'] ) ) {
    $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
  }

  $args['breadcrumb'] = $breadcrumbs->generate();

  /**
   * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
   */
  do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

  wc_get_template( 'global/breadcrumb.php', $args );
} 