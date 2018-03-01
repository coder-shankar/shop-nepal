
<?php 

session_start();


if(isset($_POST['submit'])) {
//import connection file for database connection
include('../connection.php');

//create connection 
$connection=new Connection();
$conn=$connection->connect();

//data from form
$username=$_POST['username'];
$userpasswords=$_POST['userpassword'];
$userpassword=md5($userpasswords);
$created_by=$_SESSION['admin'];


//sql query statement to add new admin
$sql ="INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `created_by`) VALUES (NULL, '$username', '$userpassword', '$created_by');";

//executin sql query statemnt 
    if($conn->query($sql)){

	echo '<script> alert("admin created sucess fully ");</script>';
    }
      else{
	echo '<script>alert("Can not create user")</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>shopnepal Admin panel</title>



<!--bootstrap css-->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<!-- font awesome icon  online if available-->
<link href="//maxcdn.bootstrapcdn.0com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- font awesome icon if not available -->
<link rel="stylesheet" href="../include/css/font-awesome.css">

<!--external css -->
<link rel="stylesheet" href="../include/css/admin_panel_style.css">

<link rel="stylesheet" type="text/css" href="css/style.css">


<!-- Include Modernizr in the head, before any other Javascript -->
<script src="../include/js/modernizr-2.6.2.min.js"></script>
<!--custome js-->
<script src="../include/js/script.js" type="text/javascript">
	</script>
</head>



<body>


<!-- 	admin MOdal -->

<div class="modal fade" id="adminModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			
				<button class="close" data-dismiss="modal">&times;</button>
				<p class="lead">Add Admin</p>
			</div> <!-- end of modal-header -->

			<div class="modal-body">


<form action="adminpanel.php" class="form-horizontal" method="post">



		

			
				
			<div class="input-group">
 <span class="lead">Username</span>
              <span class="input-group-addon">
 <i class="fa fa-user"></i> </span>
            <input type="text" class="form-control" placeholder="username" id="userName" onkeyup="validateName()" name="username">



          </div> <!-- end of input-group -->

		
			


  
   <span id="nameError"></span>


  <div class="input-group">

    <span class="lead">Password</span>

          <span class="input-group-addon">
<i class="fa fa-lock"></i> 

          </span>
          <input type="password" class="form-control" placeholder="Password" id="userPassword" 
         onkeyup="validatePassword()" name="userpassword">
        
        </div>
        <!-- end of input-group -->
 



  
<span id="passwordError"></span>

         
			
				<div class="well">
					
				
	
				<button type="submit" name="submit" value="submit" class="btn btn-primary pull-right">Add Admin</button>
				
		</div> <!-- end of input-group -->

		</form>
				
			</div> <!-- end of modal-body -->
		</div> <!-- end of modal-content -->
	</div> <!-- end of modal-dialog -->
	
</div> <!-- end of modal -->

<!-- ---------------------------------------
end of modal
--------------------------------------- -->

	<header>
	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container" id="adminpanel_navbar">
    <div class="navbar-header pull-left">

    	<!-- collapse navbar if screen is small -->
    	 <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button"> 
    	 	<span class="icon-bar"></span> 
    	 	<span class="icon-bar"></span> 
    	 	<span class="icon-bar"></span> 
    	 </button>

    	 <!-- logo -->
    	 <a href="#"><img src="../images/logo.jpg" alt="" class="img-rounded">
    	 </a>

    </div> <!-- end of navbar-header -->

    <div class="navbar-responsive-collapse collapse nav-collapse">
    	<ul class="nav navbar-nav">
    		<li class="active"><a href="">Home</a></li>
    		<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"> DataBase Management<span class="caret"></span></a>
    		<ul class="dropdown-menu">
					

					                <li><a href="product.php">Add Product</a></li>
					    			<li><a href="">Update Product</a></li>
					    			<li><a href="">Remove Product</a></li>    			

    		</ul> <!-- end of dropdown menu -->

    	</li> <!-- end of dropdown -->
    		<li><a href="summary.php">Summary</a></li>
    		<li class="dropdown" id="accountDropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>

    			<ul class="dropdown-menu">
    			   <li><a href="#adminModal" data-toggle="modal">Add Admin 
				 	  <i class="fa fa-user-plus" aria-hidden="true"></i>

    			   </a></li>
    				<li><a href="login.php">Log out  <i class="fa fa-sign-out" aria-hidden="true"></i>
</a></li>

    				<li class="divider"></li>
    				<li><a href=""></a></li>
    			</ul>
			



    		</li> <!-- end of account link -->
    		<li class="pull-right"></li>
    	</ul> <!-- end of navbar-nav -->
    	<h3 class="pull-right"><?php echo $_SESSION['admin']; ?></h3>
    	
    </div>
  </div> <!-- end of container -->
</nav> <!-- end of navbar -->
	</header> 












<div class="container lead" id="main">
	<h2 class="page-header">This is Admin Panel <span>Welcome <?php echo $_SESSION['admin']; ?></span></h2>



	<!-- listing all the Products  -->

	<?php 

//database connection 
include('../product.php');
//fetching the product from database 
$product=new Product();
$results=$product->fetchProduct();

 ?>



	<div class="product-list">

		<h3 class="product-list"><span>Product List</span></h3>

	<!-- displaying in table format -->
	<table class="table">
		
		<thead>
			<th>S.N</th>
			<th>Product Name</th>
			<th>Product Detalil</th>
			<th>Stock</th>
			<th>Last Modified</th>
			
		</thead> <!-- end of thead -->

		<tbody>

			<!-- query the product detail from database -->

			<?php  $i=0; while ($products=mysqli_fetch_array($results,MYSQLI_ASSOC)) { ?>

				<tr>

				<td><?php echo $i; $i++; ?></td>
				<td><?php echo $products['product_title']; ?></td>
				<td><?php echo $products['product_detail'] ?></td>
				<td><?php echo $products['product_quantity']; ?></td>
				<td><?php echo $products['last_modified']; ?></td>
			</tr> <!-- end of row -->
				


	

				<?php }  ?> <!-- end of while loop -->

			
		</tbody> <!-- end of table body -->

	</table> <!-- end of table -->
		
	</div> <!-- end of product-list -->



	

	<div class="row mainrow">
		<div class="col-xs-4">
			<a class="btn btn-primary">Add Products</a>
			<a class="btn btn-primary">Edit Products</a>

		</div> <!-- end of col-4 -->
		
	</div> <!-- end of row -->
	<div class="row">
			<div class="col-xs-4">

			<a class="btn btn-primary">Update Products</a>
			<a class="btn btn-primary">Delete Products</a>
				
			</div> <!-- end of col-4 -->
		</div> <!-- end of row -->
		



	<div class="container">
		<div class="row">
			


		<div class="col-8" style="border:2px solid green;">
	

	<form action="success.php" class="form-horizontal" method="post" enctype="multipart/form-data" target="_blank">

			<h2>Product</h2>

			<div class="form-group">
				<label for="product_title">Product Title</label>
				<input type="text" placeholder="product title" id="product_title" name="product_title" class="form-control">
				
			</div> <!-- end of form-group -->

<div class="form-group">
				<label for="product_price">Product Name</label>
				<input type="text" placeholder="product price" id="product_price" name="product_price" class="form-control">
				
			</div> <!-- end of form-group -->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

			<div class="form-group">

				<label for="product_detail">Product Detail</label>
				<textarea placeholder="product detail" id="product_detail" name="product_detail" class="form-control"></textarea>

					<script type="text/javascript">
						
					CKEDITOR.replace('product_detail');
					</script><!-- end of ckeditor -->
				
			</div> <!-- end of form-group -->

		


		<div class="form-group">
			<p>Select an image of product</p>
			<hr>
			<input type="file" name="myimage" id="myimage" class="form-control">
		
		</div><!--  end of form-group -->

		<div class="page-header">
			<p class="lead">Laptop Detail</p>
		</div> <!-- end of page header -->

		<div class="form-group">

			<label for="laptop_name">Laptop Name</label>
			<input type="text" id="laptop_name" name="laptop_name">
			
		</div> <!-- end of form group -->

		<div class="form-group">
			<label for="laptop_cpu">Cpu:</label>
			<input type="text" id="laptop_cpu" name="laptop_cpu">
			
		</div> <!-- end of form group -->

		<div class="form-group">
			<label for="laptop_memory">Memory</label>
			<input type="text" id="laptop_memory" name="laptop_memory">
			
		</div> <!-- end of form group -->
		<div class="form-group">
			<label for="laptop_hdd">Hard drive</label>
			<input type="text" id="laptop_hdd" name="laptop_hdd">
			
		</div> <!-- end of form group -->
		
		
	<input type="submit" name="submit" class="btn btn-primary" value="submit">

	</form> <!-- end of form -->
			
		</div> <!-- end of col-6 -->

		</div> <!-- end of row -->
		
	</div> <!-- end of container -->
	
</div> <!-- end of main -->

<footer>



</footer>



<!-- All Javascript at the bottom of the page for faster page loading --> 

<!-- First try for the online version of jQuery--> 
<script src="http://code.jquery.com/jquery.js"></script> 

<!-- If no online access, fallback to our hardcoded version of jQuery --> 
<script>window.jQuery || document.write('<script src="../includes/js/jquery-1.8.2.min.js"><\/script>')</script> 

<!-- Bootstrap JS --> 
<script src="../bootstrap/js/bootstrap.min.js"></script> 


</body>
</html>