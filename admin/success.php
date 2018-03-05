<?php 

session_start();
					

$admin_id=$_SESSION['admin_id'];
echo $admin_id;


		// include('../connection.php');
 	//   	 $connection = new Connection(); 
  //   	 $conn=$connection->connect();
$product_title=$_POST['product_title'];
echo $_FILES['product_image']['name'];

echo "string";
if (isset($_POST['laptopproductSubmit'])) {


//data attribute
$target="images/".basename($_FILES['product_image']['name']);
$image=$_FILES['product_image']['name'];
$product_title=$_POST['product_title'];
$product_price=$_POST['product_price'];
$product_detail=$_POST['product_detail'];
$product_quantity=$_POST['product_quantity'];
$date=date('Y-m-d H:i:s');
$model =$_POST['model'];
$cpu =$_POST['cpu'];
$harddisk =$_POST['harddisk'];
$os =$_POST['os'];
$ram =$_POST['ram'];




//creating product object to access its function

include('../product.php');
$product=new Product();





 	//sql rough
 	$sql="INSERT INTO `product` (`product_id`, `product_title`, `product_price`, `product_detail`, `image`, `last_modified`, `admin_id`, `product_quantity`, `product_type`) VALUES (NULL, '$product_title', '$product_price', '$product_detail', '$image', '$date', '1','$product_quantity','laptop');";

echo "after sql<br>";
$res=$product->productQuery($sql);

var_dump($res);

if(($res=$product->productQuery($sql))){

	echo " product query executed sucessfully";


$sqlproductid ="SELECT * From product ORDER BY product_id DESC LIMIT 1;";

$res=$product->productQuery($sqlproductid);

if ($res!=NULL) {

		$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
		$product_id=$result['product_id'];
		$product_id;
		echo "product id retrived sucessfully";




	
}

if ($res==NULL) {
	$product_id==1;
}



 	$sql1="INSERT INTO `Laptop` (`model`, `cpu`, `harddisk`, `ram`, `os`, `product_id`) VALUES ('$model', '$cpu','$harddisk' , '$ram', '$os', '$product_id'); ";



if ($product->productQuery($sql1)) {
	echo "laptop detail is added sucessfully";
}





if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target)) {

	echo "file moved sucessfully";
}

}


else{
	echo "error on connection";
}

	


}




elseif (isset($_POST['phoneproductSubmit'])) {

	//data attribute
$target="images/".basename($_FILES['product_image']['name']);
$image=$_FILES['product_image']['name'];
$product_title=$_POST['product_title'];
$product_price=$_POST['product_price'];
$product_detail=$_POST['product_detail'];
$date=date('Y-m-d H:i:s');
$model =$_POST['model'];
$screen =$_POST['screen'];
$sensor =$_POST['sensor'];
$os =$_POST['os'];
$camera =$_POST['camera'];
$product_id;
$product_quantity=$_POST['product_quantity'];



//creating product object to access its function

include('../product.php');
$product=new Product();


// sql to find out product id





 	//sql rough
 $sql="INSERT INTO `product` (`product_id`, `product_title`, `product_price`, `product_detail`, `image`, `last_modified`, `admin_id`, `product_quantity`, `product_type`) VALUES (NULL, '$product_title', '$product_price', '$product_detail', '$image', '$date', '1','$product_quantity','phone');";


$res=$product->productQuery($sql);
echo $res;

if($res){

	echo " product query executed sucessfully";


$sqlproductid ="SELECT * From product ORDER BY product_id DESC LIMIT 1;";

$res=$product->productQuery($sqlproductid);


if ($res!=NULL) {

		$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
		print_r($result) ;
		$product_id=$result['product_id'];
		echo $product_id;



	
}

if ($res==NULL) {
	$product_id=1;
}



 	$sql1="INSERT INTO `phone` (`model`, `screen`, `os`, `camera`, `sensor`, `product_id`) VALUES ('$model', '$screen', '$os', '$camera', '$sensor', '$product_id');";



if ($product->productQuery($sql1)) {
	echo "phone detail is added sucessfully";
}





if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target)) {

	echo "file moved sucessfully";
}

}
else{
	echo "error on connection";
}

	




	
}








else{
	echo "form is not submitted";
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<script type="text/javascript">
	
	alert("product added go back");
</script>


</body>
</html>