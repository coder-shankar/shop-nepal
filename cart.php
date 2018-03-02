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
	echo "<script>alert('Please sign in or do registration first');</script>";

	header('Location:index.php');
    exit;

	
}

// else{


// $sql ="select * from member as m left outer join cart c on m.cart_cart_id=c.cart_id left OUTER JOIN product_has_cart as pc ON c.cart_id=pc.cart_cart_id LEFT OUTER JOIN product as p ON pc.product_product_id=p.product_id;";


// if ($conn->query($sql)) {

	
// }









// }



}
 ?>

