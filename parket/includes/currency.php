<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// сначала мы добавим нашу валюту к общему массиву валют
	add_filter( 'woocommerce_currencies', 'misha_add_valyuta' );
	 
	function misha_add_valyuta( $currencies ) {
		$currencies['LA2'] = 'Рубль';
		return $currencies;
	}
	 
	// также любой валюте нужен какой-то символ
	add_filter('woocommerce_currency_symbol', 'misha_add_valyuta_symbol', 10, 2);
	 
	function misha_add_valyuta_symbol( $valyuta_symbol, $valyuta_code ) {
		// я добавил его через условие if
		// если нужно добавить несколько символов сразу, то оптимальнее конечно switch()
		if( $valyuta_code == 'LA2' ) {
			$valyuta_symbol = 'руб.'; // тут можно кстати сразу return 'a';
		}
		return $valyuta_symbol; 
	}