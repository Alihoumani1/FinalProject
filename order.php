<?php include ('partials-front/menu.php'); ?>
<?php
//check wether food id isset or no
if (isset($_GET['food_id'])) {
    //get the food id and details of selected food
    $food_id = $_GET['food_id'];
    //get the details of the selected food
    $sql = "SELECT*FROM tbl_food WHERE id=$food_id";
    //execute the query
    $res = mysqli_query($conn, $sql);
    //count the rows
    $count = mysqli_num_rows($res);
    //check wether the data is available or not
    if ($count == 1) {
        //we have data
//get data from data base
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];

    } else {
        //food not available
        //redirect to home page
        header('location:' . SITEURL);

    }
} else {
    //redirect to home page
    header('location:' . SITEURL);
}

?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search" style="background-image: url('images/category/bg.jpg');">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?Php
                    //check if image is available
                    if ($image_name == "") {
                        //image not available
                        echo "<div class='error'>Image not available.</div>";
                    } else {
                        //image is available
                        ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza"
                            class="img-responsive img-curve">
                        <?php
                    }

                    ?>

                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">
                    <p class="food-price">$<?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Ali Houmani" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@Alihoumani.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive"
                    required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>
        <?php
        //check wether submit button is clicked or not
        if (isset($_POST['submit'])) {
            //get all the details from the form
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price * $qty;
            $order_date = date("y-m-d h:i:sa");//order date
            $status = "ordered";//ordered,on delivery,delivered,canceled
            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];
            //save order in data base
            //create sql to save data
            $sql2 = "INSERT INTO tbl_order SET 
                food='$food',
                price=$price,
                qty=$qty,
                order_date='$order_date',
                status='$status',
                customer_name='$customer_name',
                customer_contact='$customer_contact',
                customer_email='$customer_email',
                customer_address='$customer_address'
                
                
                ";
            //execute the query
            $res2 = mysqli_query($conn, $sql2);
            //chech if executed
            if ($res2 == true) {
                //executed and order set
                $_SESSION['order'] = "<div class ='success'>Food ordered successfully</div>";
                header('location:' . SITEURL);
            } else {
                //failed to save order
                $_SESSION['order'] = "<div class ='success'>Failed to order food</div>";
                header('location:' . SITEURL);
            }


        }



        ?>


    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php include ('partials-front/footer.php'); ?>