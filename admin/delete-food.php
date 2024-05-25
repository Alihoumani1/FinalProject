<?php
include('../config/constants.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   

    // Delete from the database
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    // Check if deleted
    if ($res == true) {
        // Success message
        $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully</div>";
        // Redirect to manage category
        header('location:' . SITEURL . 'admin/manage-food.php');
    } else {
        // Fail message
        $_SESSION['delete'] = "<div class='error'>Failed to delete Food</div>";
        // Redirect to manage category
        header('location:' . SITEURL . 'admin/manage-food.php');
    }
} else {
    // Redirect to manage category page
    header('location:' . SITEURL . 'admin/manage-food.php');
}
?>