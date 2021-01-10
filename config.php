<?php
	$is_sandbox = true;

	define("BASE_URL", "http://localhost/vanilla-php-pagseguro-api/");

	if ($is_sandbox) {
		define("EMAIL_PAGSEGURO", "silvanetealvessevero12@hotmail.com");
		define("TOKEN_PAGSEGURO", "7AD8D3680B5E46C1893B4A0CC66A965A");
		define("URL_PAGSEGURO", "https://ws.sandbox.pagseguro.uol.com.br/v2/");
		define("SCRIPT_PAGSEGURO", "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
	} else {
		define("EMAIL_PAGSEGURO", "silvanetealvessevero12@hotmail.com");
		define("TOKEN_PAGSEGURO", "7AD8D3680B5E46C1893B4A0CC66A965A");
		define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2/");
		define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
	}
?>
