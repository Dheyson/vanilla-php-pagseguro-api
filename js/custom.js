payment();

function payment() {
	let base_url = $('.address').attr('data-address');

	$.ajax({
		url: base_url + 'payment.php',
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

function getPaymentMethods() {
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

$('#card').on('keyup', function () {
	let card_number = $(this).val();
	let amount = card_number.length;

	$('#error_message').empty();

	if (amount === 6) {
		PagSeguroDirectPayment.getBrand({
			cardBin: card_number,
			success: function (response) {
				console.log(response);

				let flag_brand = response.brand.name;

				$('.flag-card').html('<img alt="' + flag_brand + '" src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/' + flag_brand + '.png" />');
			},
			error: function (response) {
				//tratamento do erro
				$('.flag-card').empty();
				$('#error_message').html("Invalid Card").css('color', 'red');
			},
			complete: function (response) {
				//tratamento comum para todas chamadas
			}
		});
	}
});
