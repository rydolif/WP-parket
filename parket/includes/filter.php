<?php 

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}


//------------------виджеты----------------------
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


