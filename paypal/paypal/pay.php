<?php 

session_start();

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


	// execute sql query to count down the product_quantity

	//create connection 
$conn=new mysqli("localhost","root","","shopnepaldb");
//if connection error occured
if($conn->connect_error){
  die ("connection failed").$conn->connect-error;
}


$sql="UPDATE product as p  SET p.product_quantity=p.product_quantity-1 WHERE p.product_id='$_SESSION['product_id']' AND p.product_quantity>0; ";

if(($res=$conn->query($sql))){

	echo "Thank you for shopping";


}
else{
	echo "product is not available";
	sleep(4);
	header('Location:http://localhost/shopnepal/index.php');
}




	}

	else{
		header('Location:../paypal/cancelled.php');
	}
}



 ?>