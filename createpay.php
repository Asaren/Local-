<?php

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;

//Do dalszego wprowadzenia bazy - podane dane są kompletnie przypadkowe

$card = new CreditCard();
$card->setType("visa")
    ->setNumber("4148529247832259")
    ->setExpireMonth("11")
    ->setExpireYear("2137")
    ->setCvv2("012")
    ->setFirstName("Jan")
    ->setLastName("Paweł");
	
	
//zapisanie do pamięci

	$fi = new FundingInstrument();
$fi->setCreditCard($card);



//zapamiętanie płacącego/ustawienie metody
$payer = new Payer();
$payer->setPaymentMethod("credit_card")
    ->setFundingInstruments(array($fi));
	
	
	
	
//produkt


	$item1 = new Item();
$item1->setName('Ground Coffee 40 oz')
    ->setDescription('Ground Coffee 40 oz')
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setTax(0.3)
    ->setPrice(7.50);
$item2 = new Item();
$item2->setName('Granola bars')
    ->setDescription('Granola Bars with Peanuts')
    ->setCurrency('USD')
    ->setQuantity(5)
    ->setTax(0.2)
    ->setPrice(2);
	
	
//podsumowanie


	
	$itemList = new ItemList();
$itemList->setItems(array($item1, $item2));

$details = new Details();
$details->setShipping(1.2)
    ->setTax(1.3)
    ->setSubtotal(17.5);
	
	
	$amount = new Amount();
$amount->setCurrency("USD")
    ->setTotal(20)
    ->setDetails($details);
	
	$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());
	$request = clone $payment;
 
 //sprawdzennie
	
	try {
    $payment->create($apiContext);
} catch (Exception $ex) {
	
	

	
	ResultPrinter::printResult('Create Payment Using Credit Card', 'Payment', $payment->getId(), $request, $payment);

return $payment;
}
?>