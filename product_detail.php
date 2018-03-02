

<?php 
session_start();
//create connection 
$conn=new mysqli("localhost","root","","shopnepaldb");
//if connection error occured
if($conn->connect_error){
  die ("connection failed").$conn->connect-error;
}
$product_id=$_GET['id'];

//query statement 
$sql="SELECT * FROM product WHERE product_id='$product_id';";


//querying from database 
$results =$conn->query($sql);
$products=mysqli_fetch_array($results,MYSQLI_ASSOC);


//checking if the query is sucessfull or not
if (!$products) { 
  echo '<script> alert("database connection problem");</script>';
}

 ?>



<?php 

// require_once('cartmodal.php');

 ?>



<!DOCTYPE html>
<html>
<head>
	<title><?php echo $products['product_title']; ?></title>

<!-- bootstrap style sheet -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- custome style sheet -->
<link rel="stylesheet" href="include/css/style.css">




<!-- font awesome online-->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- font awesome offline -->
<link rel="stylesheet" href="include/css/font-awesome.css">



<!-- Include Modernizr in the head, before any other Javascript -->
<script src="include/js/modernizr-2.6.2.min.js"></script>
<!--custome js-->
<script src="include/js/script.js" type="text/javascript"></script>


<!-- custome style sheet for product_detail -->

<link rel="stylesheet" href="include/css/product_detail.css">

<!-- icon -->
 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />


</head>
<body>











<?php include('layout/header.php') ?>

<?php include('layout/sidebar.php') ?>  <!--sidebar-->
<div class="container" style="margin-top: 60px;">


<h2><?php echo $products['product_title']; ?></h2>

<div class="row">
  <div class="col-6">

     <?php echo '<img  class="img-rounded"src="admin/images/'.$products['image'].'"  style="width:600px;height:500px" />';
    ?>

    
  </div> <!-- end of col-6 -->   
  <div class="col-4">

<div class="sell" style="margin-left: 20px;">
<h2> <?php  echo "Rs: ".$products['product_price']; ?></h2>
<h3><span>15% discount </span></h3>


<?php $_SESSION['id']= $_GET['id']?>

  <a href="http://localhost/shopnepal/cart.php?cart=true" data-toggle="modal" class="btn btn-primary btn-block">
   Add to Cart</a>
  <a href="#" class="btn btn-primary btn-block">Buy</a>
  

</div> <!-- end of sell -->

    
  </div> <!-- end of col-4 -->
  
</div> <!-- end of row -->

 
<div class="row">

  <div class="col-4">
    
  </div> <!-- end of col-6 -->
  <div class="col-6">

    <div class="table-responsive">
      
    <table class="table-striped table ">
      <thead>
        <tr><th><p class="lead">Specification</p></th></tr>
      </thead> <!-- end of thead -->
      <tbody>
        <tr><td>Product Name:</td> <td> <?php  echo $products['product_title']; ?></td></tr>
      <tr> <td>Price:</td><td><?php echo $products['product_price']; ?> </td></tr>
      <tr><td>Product Detail:</td> <td><?php echo $products['product_detail']; ?> </td></tr>
      </tbody> <!-- end of tbody -->
    </table> <!-- end of table -->
    </div> <!-- end of table-responsive -->

    
  </div> <!-- end of col-6 -->

  
</div> <!-- end of row -->


</div> <!-- end of container-->

<footer >
 
  <?php include('layout/footer.php') ?>
</footer>




<!-- All Javascript at the bottom of the page for faster page loading --> 

<!-- First try for the online version of jQuery--> 
<script src="http://code.jquery.com/jquery.js"></script> 

<!-- If no online access, fallback to our hardcoded version of jQuery --> 
<script>window.jQuery || document.write('<script src="include/js/jquery-1.8.2.min.js"><\/script>')</script> 

<!-- Bootstrap JS --> 
<script src="bootstrap/js/bootstrap.min.js"></script> 



</body>
</html>





<?php  ?>