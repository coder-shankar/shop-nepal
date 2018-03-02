<?php 


//create connection 
$conn=new mysqli("localhost","root","","shopnepaldb");
//if connection error occured
if($conn->connect_error){
  die ("connection failed").$conn->connect-error;
}


$member_id=$_SESSION['member_id'];


// sql rough


$sql ="select * from product as p left outer join cart as c on p.product_id= c.product_id WHERE c.member_id='$member_id';";


// if (($res=$conn->query($sql))) {

//     $result =mysqli_fetch_array($res,MYSQLI_ASSOC);

// }









 ?>











<!--cart in modal-->
<div class="modal fade" id="cartModal" role="dialog">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal"> &times; </button>
                <h3>Cart Information</h3>
            </div>
            <!--end of modal-header-->

            <div class="modal-body">


                <!-- take all data from table cart -->
               

                <table class="table">
                    <thead>
                        <tr>
                            <th>sn</th>
                            <th>product</th>
                            <th>price</th>
                            <th>quantity</th>
                        </tr>

                    </thead>
                    <!-- end of table header -->


                    <tbody>

                         <?php 
                           $totalPrice=0;

                        $res=$conn->query($sql);

                          while (($result =mysqli_fetch_array($res,MYSQLI_ASSOC))) {

                            $sn=0;
                          

                            ?>
    
                        
                        <tr>
                            <td><?php $sn++;
                            echo $sn; ?></td>
                            <td> <?php  echo $result['product_title'] ; ?></td>

                            <td>
                                <?php echo $result['product_price'];

                                    $totalPrice=$totalPrice+(int)$result['product_price']*(int)$result['quantity'];
                                 ?>
                            </td>


                            <td>
                                <?php echo $result['quantity']; ?>
                            </td>

                        </tr>


                        <?php } ?>   


                    </tbody>
                    <!-- end of table body -->


                    

                </table>
                <!-- end of table -->


            </div>
            <!--end of modal-body-->

            <div class="modal-footer">
                <h3>
                        Total Price: &nbsp;<?php echo $totalPrice; ?>
                    </h3>


            </div>
            <!-- end of modal-footer -->

        </div>
        <!--end of modal-content-->

    </div>
    <!--end of modal-dialog-->

</div>
<!--end of modal-->
