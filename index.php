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
	<?php

	?>
	<button type="submit" onclick="payment()">
		Buy
	</button>
	<span class="address" data-address="<?php echo BASE_URL; ?>"></span>

	<p class="payment-method"></p>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?php echo SCRIPT_PAGSEGURO; ?>" type="text/javascript"></script>
	<script src="js/custom.js" type="text/javascript"></script>
</body>
</html>
