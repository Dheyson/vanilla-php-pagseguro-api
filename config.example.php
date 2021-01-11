<?php
	$is_sandbox = true;

	define("BASE_URL", "https://localhost/vanilla-php-pagseguro-api/");

	if ($is_sandbox) {
		define("EMAIL_PAGSEGURO", "");
		define("TOKEN_PAGSEGURO", "");
		define("URL_PAGSEGURO", "https://ws.sandbox.pagseguro.uol.com.br/v2/");
		define("SCRIPT_PAGSEGURO", "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
		define("EMAIL_STORE", '');
		define("CURRENCY_PAYMENT", 'BRL');
		define('URL_NOTIFICATION', '');
	} else {
		define("EMAIL_PAGSEGURO", "");
		define("TOKEN_PAGSEGURO", "");
		define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2/");
		define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
		define("EMAIL_STORE", '');
		define("CURRENCY_PAYMENT", 'BRL');
	}
?>
