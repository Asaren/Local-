<?php
require 'CreatePayment.php';
use PayPal\Api\Payment;

try {

    $params = array('count' => 10, 'start_index' => 5);

    $payments = Payment::all($params, $apiContext);
} catch (Exception $ex) {
	
	 	ResultPrinter::printError("List Payments", "Payment", null, $params, $ex);
    exit(1);
}

 ResultPrinter::printResult("List Payments", "Payment", null, $params, $payments);
 
 ?>