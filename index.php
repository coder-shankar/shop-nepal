<?php session_start();

// session starts
?>
<!Doctype html>
<html>
<head>
<meta charset="utf-8">

<!--website description tilte -->
<title>Shop Nepal</title>

  <meta name="viewport" content="width=device-width,initial-scale=1">

<!--bootstrap css-->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- fontawesome icon if avaliable online -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- if not available online -->
<link rel="stylesheet" href="include/css/font-awesome.css">




<!-- Include Modernizr in the head, before any other Javascript -->
<script src="include/js/modernizr-2.6.2.min.js"></script>
<!--custome js-->
<script src="include/js/script.js" type="text/javascript"></script>


<!-- icon -->
 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />

 <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">


 <!--external css -->
<link rel="stylesheet" href="include/css/style.css">

</head>
<body>


<!-- top header fixed -->
<header>
<?php include('layout/header.php') ?>
</header>
<!-- end of header -->



<div class="wrapper">
  <!--sidebar-->
<?php include('layout/sidebar.php') ?>


<!-- adding carousel slide show -->
 <?php include('layout/carousel.php') ?>


  <h2>Shop Nepal</h2>
  <p class="lead">shopnepal.com is newly created ecommerce site</p>
</div>
<!--end of wrapper-->


<!-- retriving all the products from database -->

<?php

include('product.php');
$product=new Product();

$results=$product->fetchProduct();

 ?>


<!-- main body -->
<div class="container" id="main" >
  <div class="row">
    <div class="col-12">
      <h2 class="lead">Top Treanding Laptops</h2>
    </div>
    <!--end of col-12-->
  </div>
  <!-- end of row-->

  <div class="row" id="laptopFeatures">
    <!-- retriving all product detail -->
     <?php while($products=mysqli_fetch_array($results,MYSQLI_ASSOC) ){ ?>
    <div class="col-sm-4 col-xs-2 features">
      <div class="panel">
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
      <!--end of panel-->
    </div>
    <!--end of col-sm-4 features-->


 <?php }?>
  </div>
  <!--end of laptopFeatures-->



</div>
<!--end of container-->

  <!-- footer section  -->
<footer>
  <?php include('layout/footer.php') ?>
</footer> <!-- end of footer -->


<!-- All Javascript at the bottom of the page for faster page loading -->

 <!-- First try for the online version of jQuery -->
<script src="http://code.jquery.com/jquery.js"></script> 

<!-- If no online access, fallback to our hardcoded version of jQuery -->
<script>window.jQuery || document.write('<script src="include/js/jquery-1.8.2.min.js"><\/script>')</script>

<!-- Bootstrap JS -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
