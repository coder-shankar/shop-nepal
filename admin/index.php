<?php 

include('../product.php');


// sql query to retieve the product //result
$product =new Product();

$result=$product->fetchProduct();



?>



<!-- author: @shankar ghimire -->
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>


<!--bootstrap css-->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<!-- font awesome icon  online if available-->
<link href="//maxcdn.bootstrapcdn.0com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- font awesome icon if not available -->
<link rel="stylesheet" href="../include/css/font-awesome.css">


<!-- Include Modernizr in the head, before any other Javascript -->
<script src="../include/js/modernizr-2.6.2.min.js"></script>
<!--custome js-->



	<!-- custome css -->

	<link rel="stylesheet" href="css/index_css.css">

	<meta name="viewport" content="width=device-width,initial-scale=1">


</head>
<body>


	<!-- model for add account -->



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

 

	<header>
		
		<div class="container">
			
			<h1>logo goes here</h1>

		</div>
		

	</header>



	<nav>

		<div class="container">

			<div class="collapse">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</div>
			
			<ul>
				<li><a href="">Summary</a></li>
				<li ><a href="" class="active">Products</a></li>
				<li><a href="">Product Analysis</a></li>
				<li><a href="#adminModal" data-toggle="modal">Add Account</a></li>
			</ul>
		</div>
		
	</nav>





	<div class="container">

		<div class="row">
			
			

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
			

		

		</div> <!-- end of row -->
		


	</div>  <!-- end of container -->



<hr>
	<div class="container">
		<h2>Delete and Edit product</h2>



<table>

	<tr>
		<th>selecet</th>
		<th>Product Name</th>
		<th>Product price</th>
		
		<th>Last update</th>
		<th>Image</th>
	</tr>

	<?php while($products=mysqli_fetch_array($result,MYSQLI_ASSOC) ){ ?>

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
			<button>Update</button>
			<button>Delete</button>
		</td>
	</tr>
	
<?php } ?>

<tr>
	<td><button>Delete Selected</button></td>
</tr>
</table>
		
	</div> <!-- end of contaier -->



	<footer>
		
	</footer>





	<!-- All Javascript at the bottom of the page for faster page loading -->



<!-- All Javascript at the bottom of the page for faster page loading --> 



<!-- If no online access, fallback to our hardcoded version of jQuery --> 
<script>window.jQuery || document.write('<script src="../includes/js/jquery-1.8.2.min.js"><\/script>')</script> 

<!-- Bootstrap JS --> 
<script src="../bootstrap/js/bootstrap.min.js"></script> 


 <!-- First try for the online version of jQuery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<!-- If no online access, fallback to our hardcoded version of jQuery -->
<script src="../include/js/jquery.min.js"></script>


	<!-- custome js -->
		<script type="text/javascript" src="js/admin_script.js"></script>

</body>
</html>