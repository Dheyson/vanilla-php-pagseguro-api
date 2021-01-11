<?php
	include './config.sandbox.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pagseguro - Checkout Transparente</title>
	<link rel="stylesheet" href="./css/custom.css">
</head>

<body>

	<form action="" name="pagseguro_form" id="pagseguro_form">
		<div style="display: none;">
			<input type="hidden" name="paymentMethod" id="paymentMethod" value="creditCard" /><br /><br>

			<input type="hidden" name="receiverEmail" id="receiverEmail" value="<?php echo EMAIL_STORE ?>" /><br /><br>

			<input type="hidden" name="currency" id="currency" value="<?php echo CURRENCY_PAYMENT ?>" /><br /><br>

			<input type="hidden" name="extraAmount" id="extraAmount" value="" /><br /><br>

			<input type="hidden" name="itemId1" id="itemId1" value="0001" /><br /><br>

			<input type="hidden" name="itemDescription1" id="itemDescription1"
				value="PagSeguro Crash Course" /><br /><br>

			<input type="hidden" name="itemAmount1" id="itemAmount1" value="600.00" /><br /><br>

			<input type="hidden" name="itemQuantity1" id="itemQuantity1" value="1" /><br /><br>

			<input type="hidden" name="notificationURL" id="notificationURL"
				value="<?php echo URL_NOTIFICATION ?>" /><br /><br />

			<input type="hidden" name="reference" id="reference" value="1001" /><br /><br />
		</div>

		<h2>Card Info</h2>

		<div>
			<label for="card">Credit Card</label>
			<input type="text" name="card_number" id="card_number" /><br /><br />
			<span class="flag-card"></span>
		</div>

		<label for="brand_name">Brand Name</label>
		<input name="brand_name" id="brand_name" type="text" />
		<br /><br />

		<label for="cvv_card">CCV Card</label>
		<input name="cvv_card" id="cvv_card" name="cvv_card" type="text" />
		<br /><br />

		<label for="month_expiration">Month Expiration</label>
		<input name="month_expiration" id="month_expiration" name="month_expiration" type="text" maxlength="2" />
		<br /><br />

		<label for="year_expiration">Year Expiration</label>
		<input name="year_expiration" id="year_expiration" type="text" maxlength="4" />
		<br /><br />

		<label for="installments_amount">Installments Amount</label>
		<select name="installments_amount" id="installments_amount" class="select--none">
			<option selected value="">Select the installment</option>
		</select>
		<br /><br />

		<label for="installment_value">Installment Value</label>
		<input type="text" id="installment_value" name="installment_value" />
		<br /><br />

		<label>Card CPF</label>
		<input type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" placeholder="CPF" required /><br><br>

		<label>Card Holder Name</label>
		<input type="text" name="creditCardHolderName" id="creditCardHolderName" placeholder="Card Print Name"
			required /><br><br>

		<label for="token_card">Token Card</label>
		<input type="text" id="token_card" name="token_card" />
		<br /><br />

		<label for="hash_card">Hash Card</label>
		<input type="text" id="hash_card" name="hash_card" />
		<br /><br />

		<h2>Personal Info</h2>

		<label>Name</label>
		<input type="text" name="senderName" id="senderName" placeholder="Full name" required><br><br>

		<label>Birth Date</label>
		<input type="text" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate"
			placeholder="Birth Date. Ex: 12/12/1912" required /><br><br>

		<label>CPF</label>
		<input type="text" name="senderCPF" id="senderCPF" placeholder="CPF" required /><br><br>

		<label>Phone</label>
		<input type="text" name="senderAreaCode" id="senderAreaCode" placeholder="DDD" required>
		<input type="text" name="senderPhone" id="senderPhone" placeholder="Only Number" required><br><br>

		<label>E-mail</label>
		<input type="email" name="senderEmail" id="senderEmail" placeholder="E-mail Sender" required /><br><br>

		<h2>Shipping Address</h2>

		<label>Shipping Address</label>
		<input type="text" name="shippingAddressRequired" id="shippingAddressRequired" value="true" required /><br><br>

		<label>Address</label>
		<input type="text" name="shippingAddressStreet" id="shippingAddressStreet" placeholder="Av. Rua" /><br><br>

		<label>Number</label>
		<input type="text" name="shippingAddressNumber" id="shippingAddressNumber" placeholder="Number" /><br><br>

		<label>Complement</label>
		<input type="text" name="shippingAddressComplement" id="shippingAddressComplement"
			placeholder="Complement" /><br><br>

		<label>Street</label>
		<input type="text" name="shippingAddressDistrict" id="shippingAddressDistrict" placeholder="Street" /><br><br>

		<label>CEP</label>
		<input type="text" name="shippingAddressPostalCode" id="shippingAddressPostalCode" placeholder="CEP" /><br><br>

		<label>City</label>
		<input type="text" name="shippingAddressCity" id="shippingAddressCity" placeholder="City" /><br><br>

		<label>State</label>
		<input type="text" name="shippingAddressState" id="shippingAddressState" placeholder="State Flag" /><br><br>

		<label>Country</label>
		<input type="text" name="shippingAddressCountry" id="shippingAddressCountry" value="BRL" /><br><br>

		<label>Shippment Type</label>
		<input type="radio" name="shippingType" value="1" /> PAC
		<input type="radio" name="shippingType" value="2" /> SEDEX
		<input type="radio" name="shippingType" value="3" /> Sem frete<br><br>

		<label>Shipping Cost</label>
		<input type="text" name="shippingCost" id="senderCPF" placeholder="Preço do frete. Ex: 2.10" /><br><br>

		<h2>Card Address</h2>

		<label>Address</label>
		<input type="text" name="billingAddressStreet" id="billingAddressStreet" placeholder="Av. Rua"><br><br>

		<label>Number</label>
		<input type="text" name="billingAddressNumber" id="billingAddressNumber" placeholder="Number"><br><br>

		<label>Complement</label>
		<input type="text" name="billingAddressComplement" id="billingAddressComplement"
			placeholder="Complement"><br><br>

		<label>Street</label>
		<input type="text" name="billingAddressDistrict" id="billingAddressDistrict" placeholder="Street"><br><br>

		<label>CEP</label>
		<input type="text" name="billingAddressPostalCode" id="billingAddressPostalCode"
			placeholder="CEP sem traço"><br><br>

		<label>City</label>
		<input type="text" name="billingAddressCity" id="billingAddressCity" placeholder="City"><br><br>

		<label>State</label>
		<input type="text" name="billingAddressState" id="billingAddressState" placeholder="State Flag"><br><br>

		<label>Country</label>
		<input type="text" name="billingAddressCountry" id="billingAddressCountry" value="BRL"><br><br>

		<button type="submit" name="button_buy" id="button_buy">
			BUY SUBMIT
		</button>
	</form>
	<br />
	<span id="error_message"></span>
	<div class="flag-card"></div>
	<!-- <button type="submit" onclick="payment()">
		Buy
	</button> -->
	<span class="address" data-address="<?php echo BASE_URL; ?>"></span>

	<p class="payment-method"></p>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?php echo SCRIPT_PAGSEGURO; ?>" type="text/javascript"></script>
	<script src="js/custom.js" type="text/javascript"></script>
</body>

</html>
