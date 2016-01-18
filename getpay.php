<?php

/** @var Payment $createdPayment */
$createdPayment = require 'CreatePayment.php';
use PayPal\Api\Payment;

try {
    $payment = Payment::get($paymentId, $apiContext);
} catch (Exception $ex) {
	
	ResultPrinter::printError("Get Payment", "Payment", null, null, $ex);
    exit(1);
}

ResultPrinter::printResult("Get Payment", "Payment", $payment->getId(), null, $payment);

return $payment;

?>