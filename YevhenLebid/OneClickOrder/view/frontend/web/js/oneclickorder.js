define([
  "jquery"
], function ($) {
  "use strict";
  return function (config, element) {
    $(element).find('button').on('click', function (e) {
      let phoneNumber = prompt('Enter your phone number', '');
      if (phoneNumber) {
        $.ajax({
          url: config.url,
          method: 'POST',
          data: {
            product_id: config.product_id,
            product_sku: config.product_sku,
            phone_number: phoneNumber,
          },
          dataType: "json",
          success: function (data) {
            alert(data.message);
          },
        });
      } else {
        alert('Phone number cannot be empty');
      }
    });
  }
})