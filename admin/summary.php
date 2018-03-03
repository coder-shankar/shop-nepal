<?php session_start();




if(isset($_POST['submit'])) {

include('../connection.php');



//create connection 

$connection=new Connection();
$conn=$connection->connect();

//from form
$username=$_POST['username'];
$userpassword=$_POST['userpassword'];
$created_by=$_SESSION['admin'];


//sql statement 
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



<?php 

//database connection 
include('../product.php');
//fetching the product from database 
$product=new Product();
$results=$product->fetchProduct();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>summary</title>


<!--bootstrap css-->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


<link href="//maxcdn.bootstrapcdn.0com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="../include/css/font-awesome.css">

<!--external css -->
<link rel="stylesheet" href="../include/css/admin_panel_style.css">


<!-- Include Modernizr in the head, before any other Javascript -->
<script src="../include/js/modernizr-2.6.2.min.js"></script>

</head>
<body style="background-color: white; font-size: 20px;">


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
			<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
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
    		<li ><a href="adminpanel.php">Home</a></li>
    		<li><a href="#" class="active">Summary</a></li>
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
    	
    	</ul> <!-- end of navbar-nav -->
    	
    </div>
  </div> <!-- end of container -->
</nav> <!-- end of navbar -->
		
	</header> <!-- end of header -->


	<div class="container" id="main" style="background-color: white; font-size: 20px;">

		<div class="row table-responsive">
			<table class="table-striped table detail" style="color: green;">
				<thead>
					<tr>
						<th>Admin</th>
					<th>Description </th>
					<th>Timestamp</th>


					</tr>
					
				</thead> <!-- end of table header -->
			
			

				<tbody> 
						<?php while ($products=mysqli_fetch_array($results,MYSQLI_ASSOC)) { ?>

				<tr>
				<td><?php echo $products['admin_id']; ?></td>
				<td><?php echo $products['product_title']; ?></td>
				<td><?php echo $products['last_modified'] ?></td>
			</tr> <!-- end of row -->
				


	

				<?php }  ?> <!-- end of while loop -->


				</tbody> <!-- end of table body -->

			</table> <!-- end of table -->
			
		</div> <!-- end of row -->
		
	</div> <!-- end of container  -->

	<footer>
		
	</footer> <!-- end of footer -->



<!-- All Javascript at the bottom of the page for faster page loading --> 

<!-- First try for the online version of jQuery--> 
<script src="http://code.jquery.com/jquery.js"></script> 

<!-- If no online access, fallback to our hardcoded version of jQuery --> 
<script>window.jQuery || document.write('<script src="../includes/js/jquery-1.8.2.min.js"><\/script>')</script> 

<!-- Bootstrap JS --> 
<script src="../bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>