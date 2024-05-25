<?php 
//authorization -access control
//to check if the user is logged in or not
if(!isset($_SESSION['user']))
{
    //user is  not logged in
    //redirect to login page with message
    $_SESSION['no-login-message'] = "<div class='error'>Please login to access admin Panel.</div>";

    //redirect to login page
    header('location:' . SITEURL . 'admin/login.php');
}

?>