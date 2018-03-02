<?php 
session_start();


echo $_SESSION['member_id'];
echo $_SESSION['user'];
echo $_SESSION['member_id'];
echo $_SESSION['id'];


 ?>



               <?php 

if (isset($_GET['signout'])) {

  
if ($_GET['signout']=="true") {
        unset($_GET['signout']);
         deleteCookies();

    header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
            } 

}
    ?>
       

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