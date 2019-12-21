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
      const $input = $(this).find('input[type="number"]');
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

  function calculateForm(form) {
    var areaPerItem = form.find("input[name=area_per_item]").val(),
      current_area = form.find("input[name=area]").val(),
      current_qty = form.find("input[name=quantity]").val();
    price =
      +form.find("input[name=sale_price]").val() ||
      +form.find("input[name=price]").val();

    return {
      total_price: +current_qty * price,
      area: +current_area,
      qty: +current_qty,
      area_per_item: areaPerItem
    };
  }

  // $(".add-to-cart-form").on("input", function(e) {
  //   var form = $(this);
  //   var b = calculateForm(form);

  //   qtyInput = form.find("input[name=quantity]");
  //   console.log(b);
  //   // qtyInput.val(b.qty);
  //   // b = calculateForm(form);
  //   // areaInput = form.find("input[name=area]");
  //   // areaInput.val(b.square);
  // });

  $("input[name=quantity]").on("input", function(e) {
    var form = $(e.target).closest("form");
    var vals = calculateForm(form);

    form
      .find("input[name=area]")
      .val((vals.area_per_item * vals.qty).toFixed(1));

    form.find(".total-price__value").html(vals.total_price);
  });

  $("input[name=area]").on("input", function(e) {
    var form = $(e.target).closest("form");
    var vals = calculateForm(form);

    form
      .find("input[name=quantity]")
      .val(Math.ceil(vals.area / vals.area_per_item));

    form.find(".total-price__value").html(vals.total_price);
  });

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
