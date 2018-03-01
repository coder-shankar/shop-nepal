<?php 


class Connection
{
	
public	function connect()
	{
		//create connection 
$conn=new mysqli("localhost","root","","shopnepaldb");
//if connection error occured
if($conn->connect_error)
  die ("connection failed").$conn->connect-error;
	// otherwise returen conneciton
	return $conn;
	}
}

 ?>


