$(function() {

//-------------------------------активна ссилка на якій знаходишся для меню---------------------------------------
  $('.cabinet__nav ul a').each(function () {
      var location = window.location.href;
      var link = this.href; 
      if(location == link) {
          $(this).addClass('active');
      }
  });

//------------------------------гамбургер-----------------------------
  var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });


//------------------------------гамбургер-----------------------------
  $('.hamburger').click(function() {
    $(this).toggleClass('hamburger--active');
    $('.nav').toggleClass('nav--active');
    $('body').toggleClass('no-scroll');
  });

//------------------------------гамбургер-----------------------------
  $('.header__search img').click(function() {
    $(this).toggleClass('header__search--active');
  });

//---------------------------js-----------------------
  $('.tabs__wrap').hide();
  $('.tabs__wrap:first').show();
  $('.tabs ul a:first').addClass('tabs__link--active');
   $('.tabs ul a').click(function(event){
    event.preventDefault();
    $('.tabs ul a').removeClass('tabs__link--active');
    $(this).addClass('tabs__link--active');
    $('.tabs__wrap').hide();
     var selectTab = $(this).attr('href');
    $(selectTab).fadeIn();
  });
   

  $('input[type="tel"]').mask('+0 (000) 000-00-00');

  
//-------------------------------попандер---------------------------------------
  $('.modal').popup({
    escape: false,
    blur: false,
    scrolllock: true,
    transition: 'all 0.3s'
  });


//------------------------------acardeon---------------------------
  $(".chw-widget form, .chw-widget ul").slideUp("slow");
  $(".chw-widget").first().addClass('active');
  $(".active form, .active ul").slideDown("slow");

  $(".chw-widget h2").on("click", function(){
    if ($(this).parent().hasClass('active')) {
      $(this).parent().removeClass('active');
      $(".chw-widget form, .chw-widget ul").slideUp("slow");
    }
    else {
      $(".active form, .active ul").slideUp("slow");
      $(".active").removeClass('active');
      $(this).parent().addClass('active');
      $(".active form, .active ul").slideDown("slow");
    }
  });


//------------------------------header__cart---------------------------
  $('.header__cart').hover(
      function(){ $(this).addClass('header__cart--active'); },
      function(){ $(this).removeClass('header__cart--active'); }
  );


//------------------------------header__like---------------------------
  $('.header__like').hover(
      function(){ $(this).addClass('header__like--active'); },
      function(){ $(this).removeClass('header__like--active'); }
  );
  

//--------------------------------------scroll------------------------------
   $('.woocommerce__shop_table').jScrollPane();

//--------------------------------------scroll------------------------------
     
  function cart() {
    $('.woocommerce-mini-cart').jScrollPane();
    $('.header__like .tinv-wishlist').jScrollPane();
  }
  setTimeout(cart, 3000);

});

//--------------------------------------scroll------------------------------
  $(window).resize(function(event) {
    $('.woocommerce__shop_table').jScrollPane();
    $('.woocommerce-mini-cart').jScrollPane();
    $('.header__like .tinv-wishlist').jScrollPane();
  });
