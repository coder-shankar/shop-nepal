<?php 

session_start();


if ($_GET['cart']=='true') {


	


//create connection 
$conn=new mysqli("localhost","root","","shopnepaldb");
//if connection error occured
if($conn->connect_error){
  die ("connection failed").$conn->connect-error;
}


// $connection =new Connection();
// $conn=$connection->connect();

//checking whether the member has sign in or not
// $member_id=$_SESSION['member_id'];
if (!isset($_SESSION['member_id'])) {



?>


<script>
	javascript:history.go(-1);
</script>

<?php

	
}




else{


	

$member_id=$_SESSION['member_id'];
$product_id=$_SESSION['id'];



	// retriving cart id from database

	$sql="SELECT * FROM `member` WHERE member.member_id='$member_id';";

	$res=$conn->query($sql);

	if ($res) {

		// fetch cart id
		$result=mysqli_fetch_array($res,MYSQLI_ASSOC);

		$cart_id=$result['cart_cart_id'];

		if (isset($_GET['product_quantity'])) {
		
				$product_quantity=$_GET['product_quantity'];

		}
		else{
			$product_quantity=1;
		}
		
		

		echo $product_quantity."<br>";
		echo $product_id."<br>";
		echo $cart_id."<br>";
		echo $member_id;




			//insert the data into data base

	$sql1="INSERT INTO `cart` (`cart_id`, `member_id`, `product_id`,`product_quantity`) VALUES ('$cart_id', '$member_id', '$product_id', '$product_quantity')";

$res=$conn->query($sql1);
var_dump($res);
	if ($res) {

		$sql="UPDATE product as p  SET p.product_quantity=p.product_quantity-1 WHERE p.product_id='$product_id' AND p.product_quantity>0; ";

		if (($res=$conn->query($sql))) {

			echo "product decremented sucessfully";


		}
		else{
			echo "Product seems to be out of stock";
			sleep(3);
		}





		
	


    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();

	}
	else{
		echo "product is not added to cart ";
		
    header("Location: {$_SERVER['HTTP_REFERER']}");
	}




	}

else{
	echo "query is not executed it may seems to be database problem";
}





}


}

else{
echo "get cart is not true";
}

 ?>


