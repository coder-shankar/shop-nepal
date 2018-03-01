<?php 

// php for login verification 


//create the connection
$conn=new mysqli("localhost","root","","shopnepal");
//if connection error occured
if($conn->connect_error)
  die ("connection failed").$conn->connect-error;




if(isset($_POST['submit'])){

$name=$_POST['name'];
$upass=$_POST['password'];

	  //sql  query string
$sql ="SELECT * FROM User where uname='$name' AND pass='$upass';";


	if (conn->query($sql)) {

		echo "user is found ";
	}
	else{
		echo "go back and make an account";
	}
}

 ?>