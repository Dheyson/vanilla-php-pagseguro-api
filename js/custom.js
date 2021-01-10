function payment() {
	$base_url = jQuery('.address').attr('data-address');

	$.ajax({
		url: $base_url + 'payment.php',
		type: "POST",
		dataType: "json",
		success: function (response) {
			console.log(response);
			PagSeguroDirectPayment.setSessionId(response.id);
		},
		complete: function (response) {
			getPaymentMethods();
		}
	})
}

function getPaymentMethods(params) {
	PagSeguroDirectPayment.getPaymentMethods({
		amount: 500.00,
		success: function (response) {
			console.log(response);
			$('.payment-method').append("<div>Cartão de Crédito</div>");
			$.each(response.paymentMethods.CREDIT_CARD.options, function(index, data) {
				$('.payment-method').append("<span class='img__flag--padding'><img src='https://stc.pagseguro.uol.com.br" + data.images.SMALL.path + "' alt='" + index + "image' /></span>");
			});

			$('.payment-method').append("<div>Boleto</div>");
			$('.payment-method').append("<span class='img__flag--padding'><img src='https://stc.pagseguro.uol.com.br" + response.paymentMethods.BOLETO.options.BOLETO.images.SMALL.path + "' alt='image-boleto' /></span>");

			$('.payment-method').append("<div>Cartão de Débito</div>");
			$.each(response.paymentMethods.ONLINE_DEBIT.options, function (index, data) {
				$('.payment-method').append("<span class='img__flag--padding'><img src='https://stc.pagseguro.uol.com.br" + data.images.SMALL.path + "' alt='" + index + "image' /></span>");
			});
		},
		error: function (response) {
			// Callback para chamadas que falharam.
		},
		complete: function (response) {
			// Callback para todas chamadas.
		}
	});
}
