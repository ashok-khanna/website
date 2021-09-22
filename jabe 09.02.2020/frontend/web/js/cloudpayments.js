$('.callFrame').click(function (e) {
  e.preventDefault()
  var name, email, phone, city, amount, payment_type;
  name = $('#name').val();
  email = $('#email').val();
  phone = $('#phone').val();
  city = $('#city').val();
  amount = parseInt($('.PreSum').data('id'));
  payment_type = $('input[name=payment_type]:checked').val();  
  console.log(amount)
  if (payment_type == 'card') {    
    var widget = new cp.CloudPayments({ language: "en-US" });
    widget.charge({
      publicId: 'pk_e6a2ccdea059e5cee964b530b5516',  //id из личного кабинета
      description: 'Оплата на сайте jabeconcierge.com', //назначение
      amount: amount,  //сумма
      currency: 'USD', //валюта
      skin: "classic", //дизайн виджета
      email: email,
      data: {
        name: name,
        phone: phone,
        city: city,
      }
    },
      function (options) { // success
        //действие при успешной оплате
        console.log(options)
      },
      function (reason, options) { // fail
        //действие при неуспешной оплате
        console.log(reason, options)
      });

    // var widget = new cp.CloudPayments({ language: "en-US" });
  }
});
$('.callFrameM').click(function (e) {
  e.preventDefault();
  var name, email, phone, city, amount, payment_type;
  name = $('#nameM').val();
  email = $('#emailM').val();
  phone = $('#phoneM').val();
  city = $('#cityM').val();
  amount = parseInt($('.PreSum').data('id'));
  payment_type = $('input[name=payMethod]').val();
  if (payment_type == 'card') {
    var widget = new cp.CloudPayments({ language: "en-US" });
    widget.charge({
      publicId: 'pk_e6a2ccdea059e5cee964b530b5516',  //id из личного кабинета
      description: 'Оплата на сайте jabeconcierge.com', //назначение
      amount: amount,  //сумма
      currency: 'USD', //валюта
      skin: "classic", //дизайн виджета
      email: email,
      data: {
        name: name,
        phone: phone,
        city: city,
      }
    },
      function (options) { // success
        //действие при успешной оплате
        console.log(options)
      },
      function (reason, options) { // fail
        //действие при неуспешной оплате
        console.log(reason, options)
      });
  }
});
