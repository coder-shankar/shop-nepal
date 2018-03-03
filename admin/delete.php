<?php 


//error
//also delete from sub categories

if (isset($_GET['deleteItem'])) {


	if ($_GET['deleteItem']="1") {

				//create connection 
$conn=new mysqli("localhost","root","","shopnepaldb");
//if connection error occured
if($conn->connect_error)
  die ("connection failed").$conn->connect-error;

		$product_id=(int)$_GET[id];
		$sql= "DELETE FROM `product` WHERE `product`.`product_id` = '$product_id';";

		if ($conn->query($sql)) {

			echo "<script>alert('item deleted sucessfully');</script>";
			// return back to page 

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();

		}

		else{
			echo "sorry i cannot delete this delete manually by going to actual database";
		}


	}



}





 ?>