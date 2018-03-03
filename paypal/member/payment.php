<?php 
session_start();

use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;

require '../src/start.php';


if (isset($_SESSION['member_id'])) {


$payer=new Payer();
$details=new Details();
$amount=new Amount();
$transaction=new Transaction();
$payment =new Payment();
$redirectUrls=new RedirectUrls();


//payer
$payer->setPaymentMethod('paypal');

$t=(int)$_GET['price'];

//Detail
$details->setShipping('2.00')
->setTax('0.00')
->setSubTotal($t);

$t=$t+2.00;


// amount


$amount->setCurrency('GBP')
->setTotal($t)
->setDetails($details);


//transaction

$transaction->setAmount($amount)
->setDescription('Membership');


$payment->setIntent('sale')
->setPayer($payer)
->setTransactions([$transaction]);


//redirect urls

$redirectUrls->setReturnUrl('http://localhost/paypal/paypal/pay.php?approved=true')
->setCancelUrl('http://localhost/paypal/paypal/pay.php?approved=false');


$payment->setRedirectUrls($redirectUrls);



try{

	$payment->create($api);


}catch(PPConnectionException $e){
	header('Location:../paypal/error.php');
}



foreach ($payment->getLinks() as $link) {


if ($link->getRel()=='approval_url') {


	$redirectUrls=$link->getHref();

}
header('Location:'.$redirectUrls);
}


	



}

else{
	echo "<script>alert('Please sign in first');</script>";
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}



?>