function payment() {
	$base_url = jQuery('.address').attr('data-address');

	$.ajax({
		url: $base_url + 'payment.php',
		type: "POST",
		dataType: "json",
		success: function (response) {
			console.log(response);
			PagSeguroDirectPayment.setSessionId(response.id);
		}
	})
}
