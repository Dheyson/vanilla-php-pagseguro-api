<?php
	include './config.php';
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

	<form action="" method="post" name="pagseguro_form" id="pagseguro_form">
		<label for="card">Credit Card</label>
		<input type="text" name="card_number" id="card_number" /><br />

		<label for="installments_amount">Installments Amount</label>
		<select name="installments_amount" id="installments_amount" class="select--none">
			<option selected value="">Select the installment</option>
		</select>
		<br />

		<label for="brand_name">Brand Name</label>
		<input name="brand_name" id="brand_name" type="text" />
		<br />

		<label for="cvv_card">CCV Card</label>
		<input name="cvv_card" id="cvv_card" name="cvv_card"  type="text" />
		<br />

		<label for="month_expiration">Month Expiration</label>
		<input name="month_expiration" id="month_expiration" name="month_expiration" type="text" maxlength="2" />
		<br />

		<label for="year_expiration">Year Expiration</label>
		<input name="year_expiration" id="year_expiration" type="text" maxlength="4" />
		<br />

		<label for="installment_value">Installment Value</label>
		<input type="text" id="installment_value" name="installment_value" />
		<br />

		<label for="token_card">Token Card</label>
		<input type="text" id="token_card" name="token_card" />
		<br />

		<label for="hash_card">Hash Card</label>
		<input type="text" id="hash_card" name="hash_card" />
		<br /><br />

		<button type="submit">
			SUBMIT
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
