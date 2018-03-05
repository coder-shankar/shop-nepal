<?php
 
session_start();


if(isset($_POST['submit'])) {

include('../connection.php');
 

//create connection 

$connection=new Connection();
$conn=$connection->connect();

//from form
$username=$_POST['username'];
$userpasswords=$_POST['userpassword'];
//creating the message digest before saving it into database
$userpassword=md5($userpasswords);


//sql statement 
$sql ="SELECT * From admin WHERE admin_username='$username' AND admin_password='$userpassword';";

//executin sql query statemnt 
$result=$conn->query($sql);



//fetch row 
  $GLOBALS['row'] = mysqli_fetch_row($result);
  		//checking whether result is null or not 
if (is_null($row)) {
	 echo '<script>alert("Please enter valid user name and password");</script>';

	 }
	 else{
	 	$_SESSION['admin']=$username;
	 	$_SESSION['admin_id']=$row['admin_id'];
	 	header('Location:adminpanel.php');
	 	exit();
	 
	 }
} 
		
 ?>






<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>

	<!--bootstrap css-->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!--external css -->
<link rel="stylesheet" href="css/style.css">


<!-- Include Modernizr in the head, before any other Javascript -->
<script src="../include/js/modernizr-2.6.2.min.js"></script>




</head>
<body>

<header>
	
			<div class="jumbotron" >
		<h2>Admin Panel</h2>
		<p class="lorem">This is admin login panel for shop nepal site , admin can add product ,edit product detail and can view site visitor information </p>
	</div> <!-- end of jumbotron -->
	



	
</header> <!-- end of header -->

<div class="container" id="main">
	<div class="well">

		<h2>Admin Login Panel</h2>
	<br>
<form action="login.php" class="form-horizontal" method="post" id="form1">
	
	<div class="row">
		

		<div class="col-4">
			
				
			<div class="input-group">
 <span class="lead">Username</span>
              <span class="input-group-addon">
 <i class="fa fa-user"></i> </span>
            <input type="text" class="form-control" placeholder="username" id="userName" onkeyup="validateName()" name="username">



          </div> <!-- end of input-group -->

		
			
		</div> <!--  end of col-4 -->

		<div class="col-4">
  
   <span id="nameError"></span>

</div> <!-- end of col-4-->
		
		
	</div> <!-- end of row -->
		<div class="row">
			<div class="col-4">
  <div class="input-group">

    <span class="lead">Password</span>

          <span class="input-group-addon">
<i class="fa fa-lock"></i> 

          </span>
          <input type="password" class="form-control" placeholder="Password" id="userPassword" 
         onkeyup="validatePassword()" name="userpassword">
        
        </div>
        <!-- end of input-group -->
 

</div> <!-- end of col-8 -->

<div class="col-4">
  
<span id="passwordError"></span>
</div> <!-- end of col-4 -->
         
			
		</div> <!-- end of row -->

		<div class="row">
			<div class="col-4">
				<button type="submit" name="submit" value="submit" class="btn btn-primary pull-right">Log In</button>
				
			</div> <!-- end of col-4 -->
			
		</div> <!-- end of row -->

		</form>
			
	</div> <!-- end of well -->

</div> <!-- end of container -->



<footer>
	<h2 id="error">
		<?php 
?>

	</h2>
	
</footer> <!-- end of footer -->




<!-- All Javascript at the bottom of the page for faster page loading --> 

<!-- First try for the online version of jQuery--> 
<!-- <script src="http://code.jquery.com/jquery.js"></script>  -->

<!-- If no online access, fallback to our hardcoded version of jQuery --> 
<script>window.jQuery || document.write('<script src="../include/js/jquery-1.8.2.min.js"><\/script>')</script> 

<!-- Bootstrap JS --> 
<script src="../bootstrap/js/bootstrap.min.js"></script> 
<!--custome js-->
<script src="../include/js/script.js"></script>

</body>
</html>