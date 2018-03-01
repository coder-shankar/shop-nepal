<?php 


// data from the registation form of index.php

if(isset($_POST['register'])) {



//create connection 
$conn=new mysqli("localhost","root","","shopnepal");
//if connection error occured
if($conn->connect_error){
  die ("connection failed").$conn->connect-error;
}



$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$credit=$_POST['credit'];
$passwords=$_POST['password'];

//password  hash creation before saving to database
$password=md5($passwords);



//sql query to insert the data into database
$sql ="INSERT INTO `member` (`name`, `email`
, `phone`, `address`, `gender`, `dob`, `credit`, `password`, `memberid`) VALUES ('$name', '$email', '$phone', '$address', '$gender', '$dob', '$credit', '$password', NULL);";

//checking whether the query is sucessful or not

if ($conn->query($sql) === TRUE) {

    echo "New records created successfully";
    echo '<script type="text/javascript"> alert(" your registation complete")</script>';
   // header('Location:index.php');
    exit;
} else {

	//display the query message if query is not sucessful
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//closing the database connection 
$conn->close();

}




 ?>

<!doctype html>
<html>
	<head>
		<title>registration sucessful</title>
	</head> 
	<body>
		
		<h2>data added sucessfully</h2>

		<div class="data">

	<?php		
			echo $name."<br>";
			echo $email."<br>"; 
			echo $phone."<br>";  


?>
			 

		</div> <!-- end of data -->
	</body>
</html>

