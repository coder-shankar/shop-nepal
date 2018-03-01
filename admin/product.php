<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<!--bootstrap css-->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<!-- font awesome icon  online if available-->
<link href="//maxcdn.bootstrapcdn.0com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- font awesome icon if not available -->
<link rel="stylesheet" href="../include/css/font-awesome.css">

<!--external css -->
<link rel="stylesheet" href="../include/css/admin_panel_style.css">

<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- external link to style the product -->
<link rel="stylesheet" type="text/css" href="css/product_style.css">


<!-- Include Modernizr in the head, before any other Javascript -->
<script src="../include/js/modernizr-2.6.2.min.js"></script>
<!--custome js-->
<script src="../include/js/script.js" type="text/javascript">
	</script>
</head>
<body>

	<div class="container">
		<div class="row">
			


		<div class="col-8">
	

	<form action="success.php" class="form-horizontal" method="post" enctype="multipart/form-data" target="_blank">

			<h2>Product</h2>

			<div class="form-group">
				<label for="product_title">Product Title</label>
				<input type="text" placeholder="product title" id="product_title" name="product_title" class="form-control">
				
			</div> <!-- end of form-group -->

<div class="form-group">
				<label for="product_price">Product Price</label>
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


		<div class="product_type">
			<label>Product Type</label>&nbsp;&nbsp;

			<select name="select" id="select">
				<option>Laptop</option>
				<option>Phone</option>
				
			</select> <!-- end of select -->

		</div> <!-- end of product_type -->


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


		<div class="phone">
			<div class="row">
				<div class="col-6">
					<p class="lead">Phone </p>
						<label for="phone_model">Phone Model:</label>
			<input type="text" id="phone_model" name="phone_model">
				</div> <!-- end of col-6 -->
			</div> <!-- end of row -->
		</div>  <!-- end of phone -->
		
		
	</div> <!-- end of container -->

<!-- All Javascript at the bottom of the page for faster page loading --> 

<!-- First try for the online version of jQuery--> 
<script src="http://code.jquery.com/jquery.js"></script> 

<!-- If no online access, fallback to our hardcoded version of jQuery --> 
<script>window.jQuery || document.write('<script src="../includes/js/jquery-1.8.2.min.js"><\/script>')</script> 

<!-- Bootstrap JS --> 
<script src="../bootstrap/js/bootstrap.min.js"></script> 


</body>
</html>