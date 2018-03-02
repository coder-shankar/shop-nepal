<?php 

session_start();


if ($_GET['cart']==true) {


	


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
		

			//insert the data into data base

	$sql="INSERT INTO `cart` (`cart_id`, `quantity`, `member_id`, `product_id`) VALUES ('$cart_id', '2', '$member_id', '$product_id');";

	if (($res=$conn->query($sql))) {
		
		?>
		<script type="text/javascript">
			alert("Product has been addded to cart");
		</script>

		<?php


    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();

	}
	else{
		echo "product is not added to cart ";
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


