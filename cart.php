<?php 


class Cart 
{
	
	

//fetch all the result form product table 

  public function fetchCart($member_id){
  	 $connectionn = new Connection(); 
     $conn=$connectionn->connect();

  	$sql="SELECT *FROM cart member product where  member.member_id = cart.member_id 
    AND cart.product_id = product.product_id  where member_id='$member_id'; ";


  	return $conn->query($sql);

  }
}

 ?>

