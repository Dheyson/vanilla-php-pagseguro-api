var amount = 600.00;

payment();

function payment() {
	let base_url = $('.address').attr('data-address');

	$.ajax({
		url: base_url + 'payment.php',
		type: "POST",
		dataType: "json",
		success: function (response) {
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
			getCardToken();
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

				getInstallments(flag_brand);
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

function getInstallments(brand) {
	PagSeguroDirectPayment.getInstallments({
		amount: amount,
		maxInstallmentNoInterest: 3,
		brand: brand,
		success: function (response) {
			// Retorna as opções de parcelamento disponíveis
			$.each(response.installments, function(index, data) {
				$.each(data, function(inner_index, inner_data) {
					let amount_float = inner_data.installmentAmount.toFixed(2).replace(".", ",");
					$('#installments_amount').show().append("<option value='" + inner_data.installmentAmount + "'>" + inner_data.quantity + " Parcelas de R$ " + amount_float + "</option>")
				});
			});
		},
		error: function (response) {
			// callback para chamadas que falharam.
		},
		complete: function (response) {
			// Callback para todas chamadas.
		}
	});
}

function getCardToken() {
	PagSeguroDirectPayment.createCardToken({
		cardNumber: '4111111111111111', // Número do cartão de crédito
		brand: 'visa', // Bandeira do cartão
		cvv: '123', // CVV do cartão
		expirationMonth: '12', // Mês da expiração do cartão
		expirationYear: '2030', // Ano da expiração do cartão, é necessário os 4 dígitos.
		success: function (response) {
			$('#token_card').val(response.card.token);
		},
		error: function (response) {
			// Callback para chamadas que falharam.
		},
		complete: function (response) {
			// Callback para todas chamadas.
		}
	});
}
