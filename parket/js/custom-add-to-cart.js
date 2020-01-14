jQuery(function($) {
  function customInput() {
    $('input[type="number"]').each(function(index) {
      $(this).wrap('<div class="custom-input-number"></div>');
      $(this).before('<button type="button">-</button>');
      $(this).after('<button type="button">+</button>');
    });

    $(".custom-input-number").on("click", function(e) {
      e.preventDefault();
      if (e.target.tagName !== "BUTTON") {
        return;
      }
      var $input = $(this).find('input[type="number"]');
      if (e.target.innerHTML === "+") {
        $input[0].stepUp();
        $input.trigger("input");
      }
      if (e.target.innerHTML === "-") {
        $input[0].stepDown();
        $input.trigger("input");
      }
    });
  }

  customInput();

  function calculateForm(form, value) {
    var areaPerItem = form.find("input[name=area_per_item]").val();

    var calcQty = +value / +areaPerItem;
    var calcArea = +value * +areaPerItem;

    return {
      area: calcArea,
      qty: calcQty
    };
  }

  $(".add-to-cart-form").on("input", function(e) {
    var form = $(this);
    var current_area = form.find("input[name=area]").val(),
      current_qty = form.find("input[name=quantity]").val();

    var totalPrice = form.find(".total-price__value");
    var price = +form.find("input[name=price]").val();

    totalPrice.html((current_area * price).toFixed(0));
  });

  $("input[name=quantity]").on("input", function(e) {
    var form = $(e.target).closest("form");
    var current_qty = form.find("input[name=quantity]").val();
    var areaInput = form.find("input[name=area]");

    var vals = calculateForm(form, current_qty);

    areaInput.val(vals.area.toFixed(1));
  });

  function debounce(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this,
        args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }

  $("input[name=area]").on(
    "input",
    debounce(function(e) {
      var form = $(e.target).closest("form");
      var current_area = form.find("input[name=area]").val();
      var qtyInput = form.find("input[name=quantity]");

      var vals = calculateForm(form, current_area);

      qtyInput.val(Math.round(vals.qty));

      if (!$(e.target)[0].validity.valid) {
        e.target.stepUp();

        $(".add-to-cart-form").trigger("input");
        $(this).trigger("input");
      }
    }, 500)
  );

  $(".single_add_to_cart_button").on("click", function(e) {
    e.preventDefault();

    ($thisbutton = $(this)),
      ($form = $thisbutton.closest("form.add-to-cart-form")),
      (id = $thisbutton.val()),
      (product_qty = $form.find("input[name=quantity]").val() || 1),
      (product_id = $form.find("input[name=product_id]").val() || id),
      (variation_id = $form.find("input[name=variation_id]").val() || 0);

    var data = {
      action: "ql_woocommerce_ajax_add_to_cart",
      product_id: product_id,
      product_sku: "",
      quantity: product_qty,
      variation_id: variation_id
    };

    $.ajax({
      type: "post",

      url: wc_add_to_cart_params.ajax_url,

      data: data,

      beforeSend: function(response) {
        $thisbutton.removeClass("added").addClass("loading");
      },

      complete: function(response) {
        $thisbutton.addClass("added").removeClass("loading");
      },

      success: function(response) {
        if (response.error & response.product_url) {
          window.location = response.product_url;

          return;
        } else {
          $(document.body).trigger("added_to_cart", [
            response.fragments,
            response.cart_hash,
            $thisbutton
          ]);
        }
      }
    });
  });
});
