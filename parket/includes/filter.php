<?php 

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}


//------------------виджеты-filter---------------------
  function wpb_widgets_init() {
   
   register_sidebar( array(
   'name'          => 'Фильтр',
   'id'            => 'custom-header-widget',
   'before_widget' => '<div class="chw-widget">',
   'after_widget'  => '</div>',
   'before_title'  => '<h2 class="chw-title">',
   'after_title'   => '</h2>',
   ) );
   
  }
  add_action( 'widgets_init', 'wpb_widgets_init' );


//------------------виджеты-brend---------------------
    register_sidebar( array(
      'name' => __( 'Бренды', '' ),
      'id' => 'top-area',
      'description' => __( 'Бренды', '' ),
      'before_widget' => '',
      'after_widget' => '',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ) );

