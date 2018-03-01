<?php 
// include 'cart.php'; 
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
                <!-- connection to db -->
                <?php include('cart.php'); ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th>sn</th>
                            <th>product detail</th>
                            <th>quantity</th>
                            <th>price</th>
                        </tr>

                    </thead>
                    <!-- end of table header -->


                    <tbody>


                    </tbody>
                    <!-- end of table body -->

                </table>
                <!-- end of table -->


            </div>
            <!--end of modal-body-->

            <div class="modal-footer">


            </div>
            <!-- end of modal-footer -->

        </div>
        <!--end of modal-content-->

    </div>
    <!--end of modal-dialog-->

</div>
<!--end of modal-->
