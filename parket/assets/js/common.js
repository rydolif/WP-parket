$(function() {

//-------------------------------активна ссилка на якій знаходишся для меню---------------------------------------
  $('.cabinet__nav ul a').each(function () {
      var location = window.location.href;
      var link = this.href; 
      if(location == link) {
          $(this).addClass('active');
      }
  });


//------------------------------cart slider-----------------------------
  var cart = new Swiper('.cart__img', {
    navigation: {
      nextEl: '.cart__next',
      prevEl: '.cart__prev',
    }
  });

//------------------------------cart slider-----------------------------
  var tovarPreviews = new Swiper('.tovar__previews', {
    spaceBetween: 5,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });

//------------------------------tovar slider-----------------------------
  var cartImg = new Swiper('.tovar__img', {
    navigation: {
      nextEl: '.cart__next',
      prevEl: '.cart__prev',
    },
    thumbs: {
      swiper: tovarPreviews
    }
  });

//------------------------------attribute slider-----------------------------
  var attribute = new Swiper('.attribute__slider', {
    spaceBetween: 0,
    slidesPerView: 1,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    navigation: {
      nextEl: '.attribute__next',
      prevEl: '.attribute__prev',
    },
    nested: true,
    breakpoints: {
      1440: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 3,
      },
      576: {
        slidesPerView: 2,
      }
    }
  });

//------------------------------related slider-----------------------------
  var related = new Swiper('.related__slider', {
    spaceBetween: 0,
    slidesPerView: 1,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    navigation: {
      nextEl: '.related__next',
      prevEl: '.related__prev',
    },
    nested: true,
    breakpoints: {
      1440: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 3,
      },
      576: {
        slidesPerView: 2,
      }
    }
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
  $(".chw-widget").first().addClass('chw-widget--active');
  $(".chw-widget--active form, .chw-widget--active ul").slideDown("slow");

  $(".chw-widget h2").on("click", function(){
    if ($(this).parent().hasClass('chw-widget--active')) {
      $(this).parent().removeClass('chw-widget--active');
      $(".chw-widget form, .chw-widget ul").slideUp("slow");
    }
    else {
      $(".chw-widget--active form, .chw-widget--active ul").slideUp("slow");
      $(".chw-widget--active").removeClass('chw-widget--active');
      $(this).parent().addClass('chw-widget--active');
      $(".chw-widget--active form, .chw-widget--active ul").slideDown("slow");
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
