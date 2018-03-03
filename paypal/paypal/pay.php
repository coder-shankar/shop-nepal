<?php 

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require '../src/start.php';

if ($_GET['approved']) {


	$approved=$_GET['approved'];


	if ($approved=="true") {

		
		$paymentId=$_GET['paymentId'];
		$payerId=$_GET['PayerID'];

		$payment=Payment::get($paymentId,$api);
	


	$execution =new PaymentExecution();
	$execution->setPayerId($payerId);
	$payment->execute($execution,$api);

	echo "you paid sucessfully";




	}

	else{
		header('Location:../paypal/cancelled.php');
	}
}



 ?>