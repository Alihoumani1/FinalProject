<?php 

include('../config/constants.php');
//destroy session
session_destroy();


//redirect to login password
header('location:'.SITEURL.'admin/login.php');



?>