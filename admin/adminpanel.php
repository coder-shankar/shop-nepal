
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

	<!-- custome css -->

	<link rel="stylesheet" href="css/index_css.css">

	<meta name="viewport" content="width=device-width,initial-scale=1">


<!-- Include Modernizr in the head, before any other Javascript -->
<script src="../include/js/modernizr-2.6.2.min.js"></script>
<!--custome js-->
<script src="../include/js/script.js" type="text/javascript">
	</script>
</head>



<body style="color: black;">


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
    		<li ><a href="">Home</a></li>
    		<li class="dropdown active"><a href="" class="dropdown-toggle" data-toggle="dropdown"> DataBase Management<span class="caret"></span></a>
    		
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












<div class="container lead" id="main" style="color: yellow;">
	<h2 class="page-header">This is Admin Panel <span>Welcome <?php echo $_SESSION['admin']; ?></span></h2>





<div class="row">

	<div class="well">




		<form action="success.php" class="form-horizontal" method="POST" enctype="multipart/form-data">


				<div class="container">

					<h2>Product Detail:</h2>

					<div class="form-element">
					<label for="product_title">Title</label>
					<input type="text" name="product_title" id="product_title">
					</div>
					

					<div class="form-element">
					<label for="product_price">Price</label>
					<input type="text" name="product_price" id="product_price">
					</div>


					<div class="form-element">
					<label for="product_detail">Detail</label>
					<input type="text" name="product_detail" id="product_detail">

					
					<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>


					<script type="text/javascript">
						
					CKEDITOR.replace('product_detail');
					</script><!-- end of ckeditor -->
					</div>


					<div class="form-element">
					<label for="product_image">Image</label>
					<input type="file" name="product_image" id="product_image">
					</div>

					
					<div class="form-element">
					<label for="product_type">Select Product type</label>
					
					<select id="product_type">
						<option>--Select product--</option>
							<option value="laptop">Laptop</option>	
							<option value="phone">Phone</option>
					</select>

					</div>


					<!-- input for laptop detail -->

					<div class="laptop">

						<h3>Laptop Detail:</h3>

						<div class="form-element">
					<label for="model">Model</label>
					<input type="text" name="model" id="model">
					</div>

					<div class="form-element">
					<label for="cpu">Cpu</label>
					<input type="text" name="cpu" id="cpu">
					</div>


					<div class="form-element">
					<label for="harddisk">Harddisk</label>
					<input type="text" name="harddisk" id="harddisk">
					</div>

					<div class="form-element">
					<label for="os">Operatin System</label>
					<input type="text" name="os" id="os">
					</div>


					<div class="form-element">
					<label for="ram">Memory</label>
					<input type="text" name="ram" id="ram">
					</div>



					<div class="form-element submit">
					<input type="submit" value="submit" name="laptopproductSubmit">
				</div>



						
					</div> <!-- end of laptop -->



					<div class="phone">
						<h3>Phone Detail</h3>


						<div class="form-element">
					<label for="model">Model</label>
					<input type="text" name="model" id="model">



					</div>


					<div class="form-element">
					<label for="screen">Screen</label>
					<input type="text" name="screen" id="screen">
					</div>



					<div class="form-element">
					<label for="os">Operatin System</label>
					<input type="text" name="os" id="os">
					</div>


					<div class="form-element">
					<label for="sensor">Sensor </label>
					<input type="text" name="sensor" id="sensor">
					</div>


					<div class="form-element">
					<label for="camera">Camera</label>
					<input type="text" name="camera" id="camera">
					</div>



					<div class="form-element submit">
					<input type="submit" value="submit" name="phoneproductSubmit">
						</div>
					</div> <!-- end of phone -->



				
					


				</div>



			</form>
		
	</div> <!-- end of well -->
	
</div> <!-- end of row -->

<hr>
		<h2>Delete and Edit product</h2>
<hr>

<div class="row">

	<div class="well">


<table class="table">

	<tr>
		<th>selecet</th>
		<th>Product Name</th>
		<th>Product price</th>
		
		<th>Last update</th>
		<th>Image</th>
	</tr>

	<?php


		//create connection 
$conn=new mysqli("localhost","root","","shopnepaldb");
//if connection error occured
if($conn->connect_error){
  die ("connection failed").$conn->connect-error;
	// otherwise returen conneciton

	}

$sql ="SELECT * FROM `product`;";
$result=$conn->query($sql);





	 while($products=mysqli_fetch_array($result,MYSQLI_ASSOC) ){ ?>

	<tr>
		<td>
			<input type="checkbox" name="check_list" value="<? echo $products['product_id'] ?>">
		</td>
		<td> <?php echo $products['product_title']?></td>
		<td> <?php echo $products['product_price']?></td>


		<td>
			 <?php echo $products['last_modified']?>
		</td>

		<td>
			
       <?php echo '<img  class="img-rounded"src="images/'.$products['image'].'"  style="width:100px;height:100px" />';
 ?>
		</td>
		<td>
			<a class="btn btn-primary" >Update</a>
			
			<br><br>
			<a class="btn btn-danger" href="delete.php?deleteItem=1&id=<?php echo $products['product_id']?>">Delete</a>
		</td>
	</tr>
	
<?php } ?>

<tr>
	<td><button class="btn btn-info">Delete Selected</button></td>
</tr>
</table>

		
	</div> <!-- end of well -->
	
</div> <!-- end of row -->










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
<!-- custome js -->
		<script type="text/javascript" src="js/admin_script.js"></script>

</body>
</html>