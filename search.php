<?php 

// create connection
//create connection 
$conn=new mysqli("localhost","root","","shopnepaldb");
//if connection error occured
if($conn->connect_error){
  die ("connection failed").$conn->connect-error;
}


if (isset($_GET['search'])) {

$keyword=$_GET['search'];

$keyword = mysqli_real_escape_string($conn,$keyword);

// rough sql
$sql="SELECT * FROM product 
    WHERE MATCH(product_title) AGAINST('$keyword');";

    if (($res=$conn->query($sql))) {
    
$products=mysqli_fetch_array($res,MYSQLI_ASSOC);

if ($products!=Null) {

   	while (($products=mysqli_fetch_array($res,MYSQLI_ASSOC))) { ?>
  <div class="panel">
  	<div class="panelbody">
        <div class="panel-heading">
          <h4 class="panel-title" style="color:darkgreen;"><?php echo $products['product_title'];  ?></h4>
        </div>
        <!--end of panel heading-->


       <?php echo '<img  class="img-rounded"src="admin/images/'.$products['image'].'"  style="width:200px;height:200px" />';
 ?>


        <p class="lead">price:<?php echo $products['product_price'];  ?> rs</p>
        <div class="lead"><?php echo $products['product_detail']; ?></div>
       <a href="product_detail.php?id=<?php echo $products['product_id'];  ?>&& type=<?php echo $products['product_type']; ?> " class="btn btn-block btn-info" target="_blank" >View Detail</a>
       </div>
      </div>
      <!--end of panel-->
      <?php


    	}


	
}
 else{
 	 	echo "no product were found try google";
      	?>
      	<a href="https://www.google.com/search?q=<?php echo $keyword; ?>">
   Google search
</a>
<?php


 }





      } 

      else{
      	echo "no product were found try google";
      	?>
      	<a  href=”http://www.google.com/search?q=<?php echo $keyword; ?>”>
   Google search
</a>
<?php
      }



}

else{
	echo "no search query is found ";
}







?>


<!DOCTYPE html>
<html>
<head>
	<title> search result</title>

<style type="">
	
	body{
		display: flex;
		flex-direction: column;
		justify-content: center;
		text-align: center;
		background: wheat;
		color: #543275;

	}
	.panel{
		width: 50%;
		border-radius: 10%;
		border:1px solid green;
		margin: 10px;
		background: white;
	}
	a{
		font-size: 40px;
	}


</style>

</head>
<body>

</body>
</html>