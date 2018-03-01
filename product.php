<?php 

include('connection.php');
class Product 
{
	
	

//fetch all the result form product table

  public function fetchProduct(){
  	 $connection = new Connection(); 
     $conn=$connection->connect();

  	$sql="SELECT *FROM product";

  	return $conn->query($sql);

  }

  //all type of product query
  public function productQuery($sql){

  	  	$connection = new Connection(); 
    	 $conn=$connection->connect();


    	
  		return $conn->query($sql);

  }





}

 ?>