<?php

	include './config.sandbox.php';

	$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	$result = ['error' => true, 'data' => $data];

	header('Content-Type: application/json');

	echo json_encode($result);
?>
