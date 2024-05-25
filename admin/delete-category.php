<?php
include('../config/constants.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   

    // Delete from the database
    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    // Check if deleted
    if ($res == true) {
        // Success message
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully</div>";
        // Redirect to manage category
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        // Fail message
        $_SESSION['delete'] = "<div class='error'>Failed to delete category</div>";
        // Redirect to manage category
        header('location:' . SITEURL . 'admin/manage-category.php');
    }
} else {
    // Redirect to manage category page
    header('location:' . SITEURL . 'admin/manage-category.php');
}
?>
