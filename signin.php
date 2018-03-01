<?php

session_start();

if(isset($_POST['submit'])) {

echo $_POST['submit'];


//create connection 
$conn=new mysqli("localhost","root","","shopnepal");
//if connection error occured
if($conn->connect_error){
  die ("connection failed").$conn->connect-error;
}


$username=$_POST['username'];
$userpasswords=$_POST['userpassword'];
//creating  the message digent before checking to the database value
$userpassword=md5($userpasswords);



//sql statement 
$sql ="SELECT name password From member WHERE name='$username' AND password='$userpassword';";

//executin sql query statemnt 
$result=$conn->query($sql);
echo "query executed";
//fetch row 
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


//checking whether result is null or not 
if (is_null($row)) {
	 echo "sign in unsucessful";
	 echo '<style> background:red;</style>';

	 echo '<script>
	 alert("please enter correct username and password");
	  window.location.href="index.php";

	 </script>
	
	 ';
	 	
	 }
	 else{

	 	// create the session variable  user
	 	$_SESSION['user']=$username;
	 	echo "query executed sucessfully";
	 	echo $_SESSION['user'];

	 	//creatig the member_id as session variable
	 	$_SESSION['member_id']=$row['member_id'];


if (isset($_SESSION['member_id'])) {
  # code...
  echo '<script>alert("helo");</script>';
}
else{
  echo '<script>alert("byby");</script>';
}



//setting the cookies if valid user try to login 

if ($_POST['keepSignIN']) {

//setting the cookies for user
	$cookieName="user";
	$cookieValue=$username;
	

	//setting  the cookies for password
	$cookiePassword="password";
	$cookiePasswordValue=$userpassword;

	

//setting the cookies for member_id
	$cookieMember_id="member_id";
	$cookieMember_idValue=$row['member_id'];


	$cookieExpiry=time()+(86400+7); //cookies is set to 7 days

	//if cookeis is not previously stored
	if (!(isset($_COOKIE['user']) && isset($_COOKIE['password'])&&isset($_COOKIE['member_id']))) {
 //setting the cookies
   setcookie($cookieName,$cookieValue,$cookieExpiry,"/");

   setcookie($cookiePassword,$cookiePasswordValue,$cookieExpiry,"/");

    setcookie($cookieMember_id,$cookieMember_idValue,$cookieExpiry,"/");


	}





	



}



//if id is set to 
	 	if (isset($_GET['id'])) {
	 		header('Location:product_detail.php?user='.$username);
	 	}
	 	else{
	 		header('Location:index.php');
	 	}
	 

	 	

	 }
}
?>


