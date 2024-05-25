<?php
include('../config/constants.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   

    // Delete from the database
    $sql = "DELETE FROM tbl_stock WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    // Check if deleted
    if ($res == true) {
        // Success message
        $_SESSION['delete'] = "<div class='success'> Deleted Successfully</div>";
        // Redirect to manage stock
        header('location:' . SITEURL . 'admin/manage-stock.php');
    } else {
        // Fail message
        $_SESSION['delete'] = "<div class='error'>Failed to delete </div>";
        // Redirect to manage stock
        header('location:' . SITEURL . 'admin/manage-stock.php');
    }
} else {
    // Redirect to manage stock page
    header('location:' . SITEURL . 'admin/manage-stock.php');
}
?>