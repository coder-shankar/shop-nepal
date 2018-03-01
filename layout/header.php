
<!-- if cookies is set then set the session variable  -->
<?php  

if (isset($_COOKIE['password'])&&isset($_COOKIE['user'])&&isset($_COOKIE['member_id'])) {

$_SESSION['user']=$_COOKIE['user'];
$_SESSION['member_id']=$_COOKIE['member_id'];
 }

?>

 


<?php 

include('cartmodal.php');

 ?>



	<!--top navigation bar-->

<div class="navbar navbar-fixed-top"  id="topNavigationBar"  >
  <div class="container">


 
    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
    <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button"> 
      <span class="icon-bar"></span>
       <span class="icon-bar"></span> 
       <span class="icon-bar"></span>
        </button>
    <a href="index.php" class="navbar-brand" id="logo"><img src="images/logo.png" class="img-rounded"></a>
    
    <div class="nav-collapse collapse navbar-responsive-collapse" >
      <ul class="nav navbar-nav">
        <li class="active"> <a href="index.php">Home</a> </li>
        
      </ul>

      <!--end of navbar-nav-->
      
         <form class="navbar-form  form-inline pull-right">
        <input type="text" class="form-control" placeholder="Search products ..." id="searchInput" onkeyup="search()" placeholder="Search Product ">
        <button class="btn-btn-default" type="submit"><i class="fa fa-search"></i></button>
      </form>
      <!--end of nav form-->

   

      <ul class="nav navbar-nav pull-right">
        <li> <a href="#cartModal" data-toggle="modal">Cart&nbsp; <i class="fa fa-shopping-cart"></i></a> </li>
        

        <li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <i class="fa fa-cog"></i></a>

          <ul class="dropdown-menu" style="background: #000;">
           




          <!-- session is set then display  user name-->

          <?php   if (isset($_SESSION['user'])) { ?>

              <li> <a>
            
            <!-- set the user name in header section form session -->
            <?php echo $_SESSION["user"]; ?>
           &nbsp;  <i class="fa fa-user-circle"></i> </a> 

    </li>


    <?php  }else{ ?> 

    <!-- if session variable is not set then display sign in original -->


                <li> <a href="#signModal" data-toggle="modal">
            
            <!-- set the user name in header section form session -->
         Sign In  &nbsp;  <i class="fa fa-user-circle"></i> </a> 

    </li>
<?php  } ?>




   
            <?php 
            // function to destory the cookies set

                function deleteCookies(){


unset($_SESSION['user']); 
unset($_SESSION['member_id']); 

if ((isset($_COOKIE['user']) && isset($_COOKIE['password'])&&isset($_COOKIE['member_id']))) {
  
 //destroying the cookies that are created
//setting the time negative to destroy the cookies
  unset($_COOKIE['user']);
   unset($_COOKIE['password']);
   unset($_COOKIE['member_id']);
   setcookie("user","",time()-33600,"/");
   setcookie("password","",time()-3309,"/");
   setcookie("member_id","",time()-3309,"/");   

 
  }

 

}


             ?>
            
        

          <li><a href="index.php?signout=<?php echo "true"  ?> " >Sign Out</a></li>  

    <?php if (isset($_GET['signout'])) {
         deleteCookies();
        header('Refresh: 1; url=index.php');
            } ?>

            <li class="divider"></li>
            <li><a href="#registationModal" data-toggle="modal">Registration</a></li>
            <li><a href="#">Help</a></li>
            
          </ul>
          
        </li>



      </ul>
    </div>
    <!--end of navbar collapse-->

  </div>
  <!--end of container-->
</div>
<!--end of navbar-->



<!--sign in modal-->
<div class="modal fade bd-example-modal-sm" id="signModal" role="dialog">
  <div class="modal-dialog modal-dialog-center modal-sm ">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal"> &times; </button>
        <h3>Sign In</h3>
      </div>
      <!--end of modal-header-->

      <div class="modal-body">
        <form id="signModalForm" method="post" action="signin.php">


        <div class="row">
          

<div class="col-8">
 
  <div class="input-group">
 <span>Username</span>
              <span class="input-group-addon">
 <i class="fa fa-user"></i> </span>
            <!-- input box for userName -->

            <input type="text" class="form-control" placeholder="username" id="userName" onkeyup="validateName()" name="username">



          </div> <!-- end of input-group -->


</div> <!-- end of col-8 -->

<div class="col-4">
  
   <span id="nameError"></span>
</div> <!-- end of col-4-->
       
          




        </div> <!-- end of row -->

          
<div class="row">
  


<div class="col-8">
  <div class="input-group">

    <span>Password</span>

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
        <div class="col-6">

          <?php  {
            # code...
          } ?>
          
        <input type="checkbox" name="keepSignIN"> <span>keep me sign in</span>



        </div> <!-- end of col-6 -->

        <div class="col-6">
          <button type="submit" name="submit" class="btn btn-primary">Login</button>
          
        </div> <!-- end of col-6 -->
         

       </div> <!-- end of row -->

        


 



        </form>
        <!--end of form-->

      </div>
      <!--end of modal-body-->

      <div class="modal-footer">
         

      </div> <!-- end of modal-footer -->

    </div>
    <!--end of modal-content-->

  </div>
  <!--end of modal-dialog-->

</div>
<!--end of modal-->


<!-- ----------------------------------
                   modal
         
         ------------------------------  -->         

<!--registation  in modal-->
<div class="modal fade" id="registationModal">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal"> &times; </button>
        <h3 style="color: blue;" class="lead">Registration For MemberShip</h3>
      </div>
      <!--end of modal-header-->

      <div class="modal-body">
        <form class="form-horizontal" onsubmit=" return registrationSubmit()" method="post" action="http://localhost/shopnepal/registration.php">

          <p>* field are required</p>

       
<!-- name -->
          <div class="form-group">
            <div class="col-2">
              <label for="name"  class="label-control"> Name *</label>
            </div> <!-- end of col-2 -->

            <div class="col-6">
              <input type="text" id="name" class="form-control" placeholder="your name" autofocus onkeyup="validateRegistrationName()" name="name">
            </div> <!-- end of col-6 -->

            <div class="col-4">
              <span id="registationNameError">&nbsp; </span>
            </div> <!-- end of col-4 -->

          </div> <!-- end of form-group -->

    
    <!-- email -->
          <div class="form-group">
            <div class="col-2">
              <label for="email" class="label-control">Email * </label>
            </div> <!-- end of col-2 -->

            <div class="col-6">
              <input type="text" id="email" class="form-control" placeholder="example@gmail.com" onkeyup="validateEmail()" name="email">
            </div> <!-- end of col-6-->


               <div class="col-4">
              <span id="emailError">&nbsp; </span>
            </div> <!-- end of col-4 -->


          </div> <!-- end of form-group -->

<!-- phone -->

                    <div class="form-group">
            <div class="col-2">
              <label for="phone" class="label-control"> Phone *</label>
            </div> <!-- end of col-2 -->

            <div class="col-6">
              <input type="text" id="phone" class="form-control" placeholder="e.g.98678788788" value="+977" onkeyup="validatePhone()" name="phone">
            </div> <!-- end of col-6 -->

               <div class="col-4">
              <span id="phoneError">&nbsp; </span>
            </div> <!-- end of col-4 -->

          </div> <!-- end of form-group -->


<!-- address -->
                    <div class="form-group">
            <div class="col-2">
              <label for="address" class="label-control"> Address </label>
            </div> <!-- end of col-2 -->

            <div class="col-6">
              <input type="text" id="address" class="form-control" placeholder="city name" name="address">
            </div> <!-- end of col-6 -->

          </div> <!-- end of form-group -->

<!-- gender -->
                    <div class="form-group">
            <div class="col-2">
              <label for="gender" class="label-control"> Gender *</label>
            </div> <!-- end of col-2 -->

            <div class="col-10">
             <span>Male</span> <input type="radio" name="gender" value="male" checked="true">
             <span>Female</span> <input type="radio" name="gender" value="female">
             <span>Other</span> <input type="radio" name="gender" value="other">

            </div> <!-- end of col-10 -->

          </div> <!-- end of form-group -->

<!-- dob -->

                    <div class="form-group">
            <div class="col-2">
              <label for="date" class="label-control">Date Of Birth *</label>
            </div> <!-- end of col-2 -->

            <div class="col-6">
              <input type="date" id="date" class="form-control" min="1950-01-01" max="2017-01-01" onkeyup="validateDate()" name="dob">
            </div> <!-- end of col-6 -->
               <div class="col-4">
              <span id="dateError">&nbsp; </span>
            </div> <!-- end of col-4 -->

          </div> <!-- end of form-group -->


<!-- credit -->

                    <div class="form-group">
            <div class="col-2">
              <label for="creditNumber" class="label-control">Credit * </label>
            </div> <!-- end of col-2 -->

            <div class="col-6">
              <input type="" id="creditNumber" class="form-control" placeholder="credit card number" onkeyup="validateVisa()" name="credit">
            </div> <!-- end of col-6 -->
               <div class="col-4">
              <span id="creditError">error </span>
            </div> <!-- end of col-4 -->

          </div> <!-- end of form-group -->


<!-- password -->

                    <div class="form-group">
            <div class="col-2">
              <label for="Password" class="label-control">Password * </label>
            </div> <!-- end of col-2 -->

            <div class="col-6">
              <input type="password" id="password" class="form-control" placeholder="password should be at least 6 " onkeyup="validatePass()" name="password">
            </div> <!-- end of col-6 -->
               <div class="col-4">
              <span id="passError">&nbsp; </span>
            </div> <!-- end of col-4 -->

          </div> <!-- end of form-group -->


 <span style="color: darkgreen;">       All your information will kept private and will not distributed        </span>
        

      

      </div>
      <!--end of modal-body-->

      <div class="modal-footer">
        <button type="submit" name="register" class="btn btn-primary">Register</button>
  </form>
        <!--end of form-->        

      </div> <!-- end of modal-footer -->
    </div>
    <!--end of modal-content-->

  </div>
  <!--end of modal-dialog-->

</div>
<!--end of  registration modal-->